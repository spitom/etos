$ErrorActionPreference = 'Stop'

$projectRoot = [System.IO.Path]::GetFullPath(
    (Join-Path $PSScriptRoot '..\..')
)

$distDir = Join-Path $projectRoot 'dist'
$outputDir = Join-Path $projectRoot 'dist-product'
$themeDir = Join-Path $outputDir 'etos-child'
$zipPath = Join-Path $outputDir 'etos-child.zip'

if (-not (Test-Path -LiteralPath $distDir)) {
    throw 'dist directory does not exist.'
}

$requiredDist = @(
    'style.css',
    'functions.php',
    'header.php',
    'footer.php',
    '404.php',
    'search.php'
)

foreach ($item in $requiredDist) {
    if (-not (Test-Path -LiteralPath (Join-Path $distDir $item))) {
        throw "Required dist file missing: $item"
    }
}

New-Item `
    -ItemType Directory `
    -Path $outputDir `
    -Force |
    Out-Null

if (Test-Path -LiteralPath $themeDir) {
    Remove-Item `
        -LiteralPath $themeDir `
        -Recurse `
        -Force
}

if (Test-Path -LiteralPath $zipPath) {
    Remove-Item `
        -LiteralPath $zipPath `
        -Force
}

New-Item `
    -ItemType Directory `
    -Path $themeDir `
    -Force |
    Out-Null

Copy-Item `
    -Path (Join-Path $distDir '*') `
    -Destination $themeDir `
    -Recurse `
    -Force

Compress-Archive `
    -Path $themeDir `
    -DestinationPath $zipPath `
    -CompressionLevel Optimal

if (-not (Test-Path -LiteralPath $zipPath)) {
    throw 'ZIP archive was not created.'
}

Add-Type -AssemblyName System.IO.Compression.FileSystem

$archive = [System.IO.Compression.ZipFile]::OpenRead($zipPath)

try {
    $files = @(
        $archive.Entries |
        ForEach-Object {
            $_.FullName -replace '\\', '/'
        } |
        Where-Object {
            -not $_.EndsWith('/')
        }
    )

    $distFileCount = @(
        Get-ChildItem -LiteralPath $distDir -Recurse -File
    ).Count

    if ($files.Count -ne $distFileCount) {
        throw "ZIP file count ($($files.Count)) does not match dist file count ($distFileCount)."
    }

    $requiredZip = @(
        'etos-child/style.css',
        'etos-child/functions.php',
        'etos-child/header.php',
        'etos-child/footer.php',
        'etos-child/404.php',
        'etos-child/search.php'
    )

    foreach ($item in $requiredZip) {
        if ($files -notcontains $item) {
            throw "Required file missing from ZIP: $item"
        }
    }

    $invalidRoot = @(
        $files |
        Where-Object {
            -not $_.StartsWith('etos-child/')
        }
    )

    if ($invalidRoot.Count -gt 0) {
        throw 'ZIP contains files outside etos-child directory.'
    }

    $forbiddenPatterns = @(
        '*/src/*',
        '*/node_modules/*',
        '*/phpmd.xml',
        '*/phpmd.baseline.xml',
        '*/phpstan.neon.dist',
        '*/phpstan-baseline.neon',
        '*/package.json',
        '*/package-lock.json'
    )

    foreach ($pattern in $forbiddenPatterns) {
        $found = @(
            $files |
            Where-Object {
                $_ -like $pattern
            }
        )

        if ($found.Count -gt 0) {
            throw "Forbidden content found in ZIP: $pattern"
        }
    }

    Write-Host ''
    Write-Host '=== THEME PACKAGE ==='
    Write-Host "Files: $($files.Count)"
    Write-Host ('Size: {0:N2} MB' -f ((Get-Item -LiteralPath $zipPath).Length / 1MB))
    Write-Host "Created: $zipPath"
}
finally {
    $archive.Dispose()
}

Remove-Item `
    -LiteralPath $themeDir `
    -Recurse `
    -Force

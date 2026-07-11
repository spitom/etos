# ETOS WordPress Theme

Custom WordPress child theme for the ETOS company website.

## Requirements

- WordPress with the Understrap parent theme
- PHP 8.1 or newer
- Node.js 20
- npm

## Local development

Install frontend dependencies:

```bash
npm ci
```

Compile production CSS and JavaScript:

```bash
npm run build
```

Watch SCSS and JavaScript during development:

```bash
npm run watch
```

## Deployable package

Create the complete production package:

```bash
npm run package
```

The resulting `dist/` directory contains the theme files intended for deployment.

Do not deploy a raw checkout of the source repository. Generated CSS and JavaScript files are intentionally excluded from Git and are produced during the build.

## GitHub Actions

Every pull request and every push to `main` runs the build workflow. It verifies production CSS and JavaScript and publishes a downloadable `etos-wordpress-theme-*` artifact.

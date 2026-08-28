<?php
/**
 * Shared ETOS inline icon system.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return one built-in ETOS line icon.
 *
 * All icons use currentColor.
 *
 * @param string $key Icon key.
 * @return string
 */
function etos_get_inline_icon_svg( $key ) {
    $icons = array(
        'erp' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="7" y="8" width="21" height="18" rx="4"></rect>
                <rect x="36" y="8" width="21" height="18" rx="4"></rect>
                <rect x="7" y="38" width="21" height="18" rx="4"></rect>
                <rect x="36" y="38" width="21" height="18" rx="4"></rect>
                <path d="M28 17h8M28 47h8M17.5 26v12M46.5 26v12"></path>
            </svg>
        ',
        'implementation' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="10" width="38" height="30" rx="4"></rect>
                <path d="M17 52h16M25 40v12"></path>
                <circle cx="48" cy="21" r="8"></circle>
                <path d="M48 9v4M48 29v4M36 21h4M56 21h4"></path>
                <path d="M40 13l3 3M53 26l3 3M56 13l-3 3M43 26l-3 3"></path>
            </svg>
        ',
        'integration' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="10" width="19" height="17" rx="4"></rect>
                <rect x="39" y="37" width="19" height="17" rx="4"></rect>
                <path d="M25 18h8c8 0 14 6 14 14v5"></path>
                <path d="M39 46h-8c-8 0-14-6-14-14v-5"></path>
                <path d="M43 33l4 4 4-4M21 31l-4-4-4 4"></path>
            </svg>
        ',
        'network' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="9" y="7" width="46" height="13" rx="3"></rect>
                <rect x="9" y="26" width="46" height="13" rx="3"></rect>
                <rect x="9" y="45" width="46" height="13" rx="3"></rect>
                <circle cx="17" cy="13.5" r="2"></circle>
                <circle cx="17" cy="32.5" r="2"></circle>
                <circle cx="17" cy="51.5" r="2"></circle>
                <path d="M24 14h23M24 33h23M24 52h23"></path>
            </svg>
        ',
        'support' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M12 34v-5c0-12 8-21 20-21s20 9 20 21v5"></path>
                <rect x="7" y="30" width="10" height="18" rx="4"></rect>
                <rect x="47" y="30" width="10" height="18" rx="4"></rect>
                <path d="M52 48c0 6-5 9-12 9h-4"></path>
                <circle cx="32" cy="57" r="3"></circle>
            </svg>
        ',
        'code' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="9" width="52" height="46" rx="5"></rect>
                <path d="M6 20h52"></path>
                <circle cx="13" cy="15" r="1.5"></circle>
                <circle cx="19" cy="15" r="1.5"></circle>
                <circle cx="25" cy="15" r="1.5"></circle>
                <path d="M25 31l-7 6 7 6M39 31l7 6-7 6M35 27l-6 20"></path>
            </svg>
        ',
        'fiscal' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M17 7h30v16H17z"></path>
                <rect x="8" y="22" width="48" height="27" rx="5"></rect>
                <path d="M17 43h30v14H17zM18 30h12M18 36h8"></path>
                <circle cx="47" cy="31" r="2"></circle>
                <circle cx="40" cy="31" r="2"></circle>
            </svg>
        ',
        'signature' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M14 6h25l11 11v39H14z"></path>
                <path d="M39 6v12h11M22 27h20M22 34h13"></path>
                <path d="M23 49c8-12 13-9 10-4 5-5 7-3 5 1 4-3 7-2 9 1"></path>
            </svg>
        ',
        'remote' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="8" width="52" height="36" rx="5"></rect>
                <path d="M20 56h24M32 44v12"></path>
                <path d="M37 20l14 7-6 2 4 8-5 2-4-8-5 5z"></path>
            </svg>
        ',
        'document-sign' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M14 6h25l11 11v39H14z"></path>
                <path d="M39 6v12h11"></path>
                <path d="M21 43l5 5 15-15"></path>
                <path d="M36 38l13-13 5 5-13 13-8 3z"></path>
            </svg>
        ',
        'mail-shield' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="12" width="38" height="31" rx="5"></rect>
                <path d="M8 16l17 14 17-14"></path>
                <path d="M46 27l11 4v8c0 8-4 14-11 17-7-3-11-9-11-17v-8z"></path>
                <path d="M41 40l4 4 7-9"></path>
            </svg>
        ',
        'shield-certificate' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M32 6l21 8v15c0 14-8 24-21 29C19 53 11 43 11 29V14z"></path>
                <circle cx="32" cy="28" r="8"></circle>
                <path d="M28 36l-3 12 7-4 7 4-3-12"></path>
                <path d="M29 28l2 2 4-5"></path>
            </svg>
        ',
        'office-badge' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M9 56V18l23-11 23 11v38"></path>
                <path d="M18 27h8M38 27h8M18 36h8M38 36h8"></path>
                <circle cx="32" cy="49" r="7"></circle>
                <path d="M29 49l2 2 4-5"></path>
            </svg>
        ',
        'car-route' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M8 42l5-14h29l6 14"></path>
                <rect x="6" y="39" width="45" height="13" rx="4"></rect>
                <circle cx="16" cy="52" r="4"></circle>
                <circle cx="42" cy="52" r="4"></circle>
                <path d="M17 28l5-9h12l6 9"></path>
                <path d="M53 10c5 0 9 4 9 9 0 7-9 15-9 15s-9-8-9-15c0-5 4-9 9-9z"></path>
                <circle cx="53" cy="19" r="2.5"></circle>
            </svg>
        ',
        'dual-location' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M22 18c0 8-10 18-10 18S2 26 2 18a10 10 0 0 1 20 0z" transform="translate(5 2)"></path>
                <circle cx="17" cy="20" r="3"></circle>
                <path d="M22 43c7 0 12-3 17-7"></path>
                <path d="M57 34c0 8-10 18-10 18S37 42 37 34a10 10 0 0 1 20 0z"></path>
                <circle cx="47" cy="34" r="3"></circle>
            </svg>
        ',
        'cash-register' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="10" y="9" width="34" height="20" rx="4"></rect>
                <path d="M15 35h35l5 20H9z"></path>
                <path d="M17 42h6M28 42h6M39 42h6"></path>
                <path d="M17 49h6M28 49h6M39 49h6"></path>
                <path d="M18 17h18M18 22h10"></path>
            </svg>
        ',
        'receipt-printer' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M18 6h28v17H18z"></path>
                <rect x="8" y="21" width="48" height="26" rx="5"></rect>
                <path d="M17 39h30v19l-5-3-5 3-5-3-5 3-5-3-5 3z"></path>
                <circle cx="47" cy="29" r="2"></circle>
            </svg>
        ',
        'online-terminal' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="8" y="20" width="35" height="34" rx="5"></rect>
                <path d="M14 29h23M15 39h5M24 39h5M33 39h5"></path>
                <path d="M47 31c4-4 10-4 14 0M50 35c2-2 6-2 8 0"></path>
                <circle cx="54" cy="40" r="2"></circle>
                <path d="M17 14c6-6 16-6 22 0"></path>
            </svg>
        ',
        'clipboard-choice' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
    <path d="M10 16h29M47 16h7"></path>
    <circle cx="43" cy="16" r="4"></circle>

    <path d="M10 31h9M27 31h27"></path>
    <circle cx="23" cy="31" r="4"></circle>

    <path d="M10 46h23M41 46h13"></path>
    <circle cx="37" cy="46" r="4"></circle>

    <path d="M43 54l4 4 9-11"></path>
</svg>
        ',
        'gear-wrench' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
    <rect x="7" y="9" width="39" height="31" rx="5"></rect>
    <path d="M17 51h20M27 40v11"></path>

    <circle cx="46" cy="43" r="8"></circle>
    <circle cx="46" cy="43" r="3"></circle>

    <path d="M46 31v4M46 51v4"></path>
    <path d="M34 43h4M54 43h4"></path>
    <path d="M38 35l3 3M51 48l3 3"></path>
    <path d="M54 35l-3 3M41 48l-3 3"></path>
</svg>
        ',
        'plug-flow' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
    <rect x="5" y="13" width="20" height="27" rx="4"></rect>
    <path d="M10 20h10"></path>
    <path d="M10 28h4M17 28h4M10 34h4M17 34h4"></path>

    <rect x="39" y="24" width="20" height="17" rx="3"></rect>
    <path d="M44 47h10M49 41v6"></path>

    <path d="M28 23h8"></path>
    <path d="M33 19l4 4-4 4"></path>

    <path d="M36 34h-8"></path>
    <path d="M31 30l-4 4 4 4"></path>
</svg>
        ',
        'headset-tools' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M8 33v-5C8 16 17 7 29 7s21 9 21 21v5"></path>
                <rect x="5" y="29" width="10" height="18" rx="4"></rect>
                <rect x="45" y="29" width="10" height="18" rx="4"></rect>
                <path d="M50 47c0 6-5 9-12 9h-4"></path>
                <circle cx="30" cy="56" r="3"></circle>
                <path d="M52 12l6 6M58 12l-6 6"></path>
            </svg>
        ',        'onsite' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M10 56V19l22-11 22 11v37"></path>
                <path d="M18 26h8M38 26h8M18 35h8M38 35h8"></path>
                <path d="M27 56V44h10v12M6 56h52"></path>
            </svg>
        ',
        'locations' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M24 25c0 10-12 22-12 22S0 35 0 25a12 12 0 0 1 24 0z" transform="translate(5 -7)"></path>
                <circle cx="17" cy="18" r="3"></circle>
                <path d="M59 31c0 10-12 22-12 22S35 41 35 31a12 12 0 0 1 24 0z"></path>
                <circle cx="47" cy="31" r="3"></circle>
                <path d="M24 45c7-7 14-9 20-8"></path>
            </svg>
        ',
        'automation' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="32" cy="32" r="10"></circle>
                <path d="M32 7v8M32 49v8M7 32h8M49 32h8"></path>
                <path d="M14 14l6 6M44 44l6 6M50 14l-6 6M20 44l-6 6"></path>
                <path d="M27 32l4 4 7-9"></path>
            </svg>
        ',
        'shield' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M32 6l21 8v15c0 14-8 24-21 29C19 53 11 43 11 29V14z"></path>
                <path d="M22 32l7 7 14-16"></path>
            </svg>
        ',
        'growth' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M9 54h46"></path>
                <path d="M14 47l12-13 9 7 15-20"></path>
                <path d="M40 21h10v10"></path>
                <circle cx="14" cy="47" r="2"></circle>
                <circle cx="26" cy="34" r="2"></circle>
                <circle cx="35" cy="41" r="2"></circle>
            </svg>
        ',
        'audit' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="27" cy="27" r="16"></circle>
                <path d="M39 39l14 14"></path>
                <path d="M19 27l6 6 11-13"></path>
            </svg>
        ',
        'monitoring' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="9" width="52" height="36" rx="5"></rect>
                <path d="M20 56h24M32 45v11"></path>
                <path d="M14 31h8l5-10 8 18 6-12h9"></path>
            </svg>
        ',
        'uptime' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="32" cy="32" r="24"></circle>
                <path d="M32 17v15l10 6"></path>
                <path d="M17 12l4 6M47 12l-4 6"></path>
                <path d="M24 6h16"></path>
            </svg>
        ',
        'orders' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M16 7h32v50H16z"></path>
                <path d="M23 18h18M23 27h11"></path>
                <path d="M23 42l5 5 13-15"></path>
            </svg>
        ',
        'warehouse' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M7 24L32 8l25 16v33H7z"></path>
                <path d="M17 31h30v26H17z"></path>
                <path d="M17 40h30M27 31v26M37 31v26"></path>
            </svg>
        ',
        'sales' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M8 51h48"></path>
                <path d="M13 44l11-12 9 7 17-21"></path>
                <path d="M40 18h10v10"></path>
                <circle cx="13" cy="44" r="2"></circle>
                <circle cx="24" cy="32" r="2"></circle>
                <circle cx="33" cy="39" r="2"></circle>
            </svg>
        ',
        'multichannel' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="10" width="21" height="16" rx="3"></rect>
                <rect x="37" y="10" width="21" height="16" rx="3"></rect>
                <rect x="21.5" y="40" width="21" height="16" rx="3"></rect>
                <path d="M16.5 26v7h31v-7"></path>
                <path d="M32 33v7"></path>
            </svg>
        ',
        'finance' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="32" cy="32" r="24"></circle>
                <path d="M39 22c-2-2-5-3-8-3-5 0-9 3-9 7s3 6 10 7 10 3 10 7-4 7-10 7c-4 0-8-1-11-4"></path>
                <path d="M32 13v38"></path>
            </svg>
        ',
        'accounting' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="8" y="7" width="48" height="50" rx="5"></rect>
                <path d="M17 17h30M17 25h18"></path>
                <path d="M17 36h8M17 46h8M34 36h13M34 46h13"></path>
                <path d="M29 32v19"></path>
            </svg>
        ',
        'payments' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="14" width="52" height="36" rx="5"></rect>
                <path d="M6 25h52"></path>
                <path d="M15 39h13"></path>
                <circle cx="47" cy="39" r="4"></circle>
            </svg>
        ',
        'documents' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M14 6h25l11 11v41H14z"></path>
                <path d="M39 6v12h11"></path>
                <path d="M22 29h20M22 37h20M22 45h13"></path>
            </svg>
        ',
        'customers' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="24" cy="22" r="9"></circle>
                <circle cx="45" cy="25" r="7"></circle>
                <path d="M7 53c1-12 7-18 17-18s16 6 17 18"></path>
                <path d="M39 39c10 0 15 5 17 14"></path>
            </svg>
        ',
        'analytics' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M9 55V9"></path>
                <path d="M9 55h46"></path>
                <rect x="17" y="35" width="7" height="14" rx="2"></rect>
                <rect x="29" y="25" width="7" height="24" rx="2"></rect>
                <rect x="41" y="14" width="7" height="35" rx="2"></rect>
            </svg>
        ',
        'hr' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="24" cy="20" r="8"></circle>
                <circle cx="45" cy="24" r="6"></circle>
                <path d="M8 51c1-11 6-17 16-17s15 6 16 17"></path>
                <path d="M40 39c9 0 14 4 16 12"></path>
                <path d="M47 10v8M43 14h8"></path>
            </svg>
        ',
        'production' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M7 56V29l14 8V26l15 9V21l21 12v23z"></path>
                <path d="M16 46h7M31 46h7M46 46h7"></path>
                <path d="M48 21V8h7v17"></path>
            </svg>
        ',
        'logistics' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M6 17h32v29H6z"></path>
                <path d="M38 27h10l10 10v9H38z"></path>
                <circle cx="18" cy="49" r="5"></circle>
                <circle cx="49" cy="49" r="5"></circle>
                <path d="M38 37h20"></path>
            </svg>
        ',
        'tax' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M14 6h25l11 11v41H14z"></path>
                <path d="M39 6v12h11"></path>
                <circle cx="25" cy="32" r="4"></circle>
                <circle cx="40" cy="45" r="4"></circle>
                <path d="M42 29L23 48"></path>
            </svg>
        ',
        'database' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <ellipse cx="32" cy="13" rx="21" ry="7"></ellipse>
                <path d="M11 13v14c0 4 9 7 21 7s21-3 21-7V13"></path>
                <path d="M11 27v14c0 4 9 7 21 7s21-3 21-7V27"></path>
                <path d="M11 41v10c0 4 9 7 21 7s21-3 21-7V41"></path>
            </svg>
        ',
        'data-transfer' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="10" width="19" height="17" rx="3"></rect>
                <rect x="39" y="37" width="19" height="17" rx="3"></rect>
                <path d="M27 18h19"></path>
                <path d="M41 13l5 5-5 5"></path>
                <path d="M37 46H18"></path>
                <path d="M23 41l-5 5 5 5"></path>
            </svg>
        ',
        'workflow' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="7" y="8" width="18" height="14" rx="3"></rect>
                <rect x="39" y="25" width="18" height="14" rx="3"></rect>
                <rect x="7" y="42" width="18" height="14" rx="3"></rect>
                <path d="M25 15h8c6 0 9 4 9 10"></path>
                <path d="M39 32h-6c-6 0-9 4-9 10"></path>
            </svg>
        ',
        'incident' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M39 9a13 13 0 0 0-16 16L9 39a7 7 0 0 0 10 10l14-14A13 13 0 0 0 49 19l-9 9-8-8z"></path>
                <path d="M14 44l6 6"></path>
            </svg>
        ',
        'contract' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M32 6l21 8v15c0 14-8 24-21 29C19 53 11 43 11 29V14z"></path>
                <path d="M21 32l7 7 15-17"></path>
            </svg>
        ',
        'training' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="9" y="9" width="46" height="40" rx="5"></rect>
                <path d="M19 20h26M19 29h17"></path>
                <path d="M22 56h20M32 49v7"></path>
                <path d="M42 37l5 5 9-11"></path>
            </svg>
        ',
        'examples' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="7" y="8" width="50" height="38" rx="5"></rect>
                <path d="M17 20h16M17 28h11"></path>
                <path d="M37 31l5 5 9-12"></path>
                <path d="M24 56h16M32 46v10"></path>
            </svg>
        ',
        'trainer' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="24" cy="20" r="8"></circle>
                <path d="M8 52c1-11 6-17 16-17s15 6 16 17"></path>
                <path d="M46 10v20M38 18h16"></path>
                <path d="M40 37h14v14H40z"></path>
            </svg>
        ',
        'efficiency' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M11 46a23 23 0 1 1 42 0"></path>
                <path d="M32 32l13-11"></path>
                <circle cx="32" cy="32" r="4"></circle>
                <path d="M18 46h28"></path>
                <path d="M17 27l5 3M47 27l-5 3M32 13v6"></path>
            </svg>
        ',
        'service' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="32" cy="32" r="11"></circle>
                <path d="M32 6v9M32 49v9M6 32h9M49 32h9"></path>
                <path d="M14 14l7 7M43 43l7 7M50 14l-7 7M21 43l-7 7"></path>
            </svg>
        ',
    );

    return $icons[ $key ]
        ?? $icons['service'];
}

/**
 * Guess an ETOS icon from a visible label/title.
 *
 * @param string $title Visible title.
 * @return string
 */
function etos_get_inline_icon_key_for_title( $title ) {
    $slug = sanitize_title(
        (string) $title
    );

    if (
        false !== strpos( $slug, 'monitoring' )
        || false !== strpos( $slug, 'monitorow' )
    ) {
        return 'monitoring';
    }

    if ( false !== strpos( $slug, 'audyt' ) ) {
        return 'audit';
    }

    if (
        false !== strpos( $slug, 'stabiln' )
        || false !== strpos( $slug, 'ciaglosc' )
        || false !== strpos( $slug, 'dostepnosc' )
    ) {
        return 'uptime';
    }

    if (
        false !== strpos( $slug, 'bezpiecz' )
        && (
            false !== strpos( $slug, 'danych' )
            || false !== strpos( $slug, 'dostep' )
        )
    ) {
        return 'shield';
    }

    if ( false !== strpos( $slug, 'zdaln' ) ) {
        return 'remote';
    }

    if ( false !== strpos( $slug, 'siedzib' ) ) {
        return 'onsite';
    }

    if ( false !== strpos( $slug, 'lokaliz' ) ) {
        return 'locations';
    }

    if ( false !== strpos( $slug, 'integrac' ) ) {
        return 'integration';
    }

    if (
        false !== strpos( $slug, 'sprawniejsz' )
        || false !== strpos( $slug, 'reczn' )
        || false !== strpos( $slug, 'automaty' )
    ) {
        return 'automation';
    }

    if (
        false !== strpos( $slug, 'dalszego-rozwoju' )
        || false !== strpos( $slug, 'gotowy-do-dalszego' )
    ) {
        return 'growth';
    }

    if (
        false !== strpos( $slug, 'bezpiecz' )
        && false !== strpos( $slug, 'uruchom' )
    ) {
        return 'shield';
    }

    if (
        false !== strpos( $slug, 'wdro' )
        || false !== strpos( $slug, 'implement' )
    ) {
        return 'implementation';
    }

    if (
        false !== strpos( $slug, 'serwer' )
        || false !== strpos( $slug, 'sieci' )
        || false !== strpos( $slug, 'infrastruktur' )
    ) {
        return 'network';
    }

    if (
        false !== strpos( $slug, 'opieka' )
        || false !== strpos( $slug, 'serwis' )
        || false !== strpos( $slug, 'wsparcie' )
    ) {
        return 'support';
    }

    if (
        false !== strpos( $slug, 'programist' )
        || false !== strpos( $slug, 'kod' )
    ) {
        return 'code';
    }

    if ( false !== strpos( $slug, 'fiskal' ) ) {
        return 'fiscal';
    }

    if (
        false !== strpos( $slug, 'podpis' )
        || false !== strpos( $slug, 'certyf' )
    ) {
        return 'signature';
    }

    if (
        false !== strpos( $slug, 'erp' )
        || false !== strpos( $slug, 'oprogramowanie' )
        || false !== strpos( $slug, 'proces' )
    ) {
        return 'erp';
    }

    return 'service';
}

/**
 * Resolve a business icon from a software card title and description.
 *
 * Title matches have a higher weight than description matches.
 * Manual ACF selection should always take precedence over this resolver.
 *
 * @param string $title Card title.
 * @param string $text  Card description.
 * @return string
 */
function etos_get_business_icon_key_for_content(
    $title,
    $text = ''
) {
    $title_slug = sanitize_title(
        wp_strip_all_tags(
            (string) $title
        )
    );

    $text_slug = sanitize_title(
        wp_strip_all_tags(
            (string) $text
        )
    );

    $rules = array(
        'orders' => array(
            'zamow',
            'ofert',
            'realizacj-zamow',
        ),
        'warehouse' => array(
            'magazyn',
            'stan-magazyn',
            'towar',
            'inwentaryz',
        ),
        'multichannel' => array(
            'wielokanal',
            'kanal-sprzedaz',
            'sprzedaz-stacjonarn',
            'sprzedaz-internet',
            'sprzedaz-hurt',
        ),
        'sales' => array(
            'sprzedaz',
            'handel',
            'marz',
            'cennik',
            'rabat',
        ),
        'accounting' => array(
            'ksiegow',
            'ksiega',
            'rachunkow',
            'dekret',
            'bilans',
        ),
        'finance' => array(
            'finans',
            'budzet',
            'koszt',
            'przychod',
        ),
        'payments' => array(
            'platn',
            'nalezn',
            'zobowiaz',
            'rozrachun',
            'przelew',
        ),
        'tax' => array(
            'vat',
            'jpk',
            'ksef',
            'podat',
        ),
        'documents' => array(
            'dokument',
            'faktur',
            'obieg',
            'plik',
        ),
        'customers' => array(
            'klient',
            'kontrahent',
            'crm',
            'dostawc',
        ),
        'analytics' => array(
            'raport',
            'analiz',
            'dashboard',
            'wskaznik',
            'dane',
        ),
        'hr' => array(
            'kadry',
            'place',
            'pracownik',
            'wynagrodz',
            'hr',
        ),
        'production' => array(
            'produkc',
            'technolog',
            'zlecen-produk',
        ),
        'logistics' => array(
            'logist',
            'transport',
            'wysyl',
            'dostaw',
        ),
        'integration' => array(
            'integrac',
            'api',
            'wymian-informac',
            'wymian-danych',
            'systemami',
        ),
        'automation' => array(
            'automatyzac',
            'automatyz',
            'reczn',
            'powtarzaln',
        ),
        'shield' => array(
            'bezpiecz',
            'uprawnien',
            'dostep',
        ),
    );

    $scores = array();

    foreach ( $rules as $key => $keywords ) {
        $scores[ $key ] = 0;

        foreach ( $keywords as $keyword ) {
            if (
                '' !== $title_slug
                && false !== strpos(
                    $title_slug,
                    $keyword
                )
            ) {
                $scores[ $key ] += 3;
            }

            if (
                '' !== $text_slug
                && false !== strpos(
                    $text_slug,
                    $keyword
                )
            ) {
                $scores[ $key ] += 1;
            }
        }
    }

    /*
     * Give characteristic title phrases a strong advantage over
     * generic words such as "sprzedaż", "dane" or "system".
     *
     * Description still contributes to the normal score above.
     */
    $title_priority_rules = array(
        'multichannel' => array(
            'wielokanal',
        ),
        'orders' => array(
            'zamow',
        ),
        'warehouse' => array(
            'magazyn',
            'inwentaryz',
        ),
        'accounting' => array(
            'ksiegow',
            'rachunkow',
        ),
        'tax' => array(
            'ksef',
            'jpk',
            'vat',
            'podat',
        ),
        'hr' => array(
            'kadry',
            'place',
            'wynagrodz',
        ),
        'production' => array(
            'produkc',
        ),
        'logistics' => array(
            'logist',
            'transport',
        ),
        'integration' => array(
            'integrac',
        ),
        'automation' => array(
            'automatyzac',
            'automatyz',
        ),
        'finance' => array(
            'finans',
        ),
    );

    foreach (
        $title_priority_rules
        as $key => $keywords
    ) {
        foreach ( $keywords as $keyword ) {
            if (
                '' !== $title_slug
                && false !== strpos(
                    $title_slug,
                    $keyword
                )
            ) {
                $scores[ $key ] += 5;
            }
        }
    }

    arsort(
        $scores,
        SORT_NUMERIC
    );

    $keys = array_keys(
        $scores
    );

    $best_key = $keys[0] ?? 'service';
    $best     = $scores[ $best_key ] ?? 0;

    if ( $best < 2 ) {
        return 'service';
    }

    return $best_key;
}

/**
 * Resolve an icon for offer-landing cards.
 *
 * Uses exact offer titles first, then offer-specific keywords,
 * then falls back to the generic service resolver.
 *
 * @param string $title Card title.
 * @param string $text  Card description.
 * @return string
 */
function etos_get_offer_icon_key_for_content(
    $title,
    $text = ''
) {
    $title_slug = sanitize_title(
        wp_strip_all_tags(
            (string) $title
        )
    );

    $text_slug = sanitize_title(
        wp_strip_all_tags(
            (string) $text
        )
    );

    $exact = array(
        'podpis-elektroniczny' =>
            'document-sign',

        'cyfryzacja-procesow-firmowych' =>
            'workflow',

        'e-doreczenia-i-uwierzytelnianie' =>
            'mail-shield',

        'certyfikaty-i-bezpieczenstwo-danych' =>
            'shield-certificate',

        'punkt-partnerski-certum' =>
            'office-badge',

        'dojazd-do-klienta' =>
            'car-route',

        'obsluga-w-dwoch-lokalizacjach' =>
            'dual-location',

        'kasy-fiskalne' =>
            'cash-register',

        'drukarki-fiskalne' =>
            'receipt-printer',

        'urzadzenia-fiskalne-online' =>
            'online-terminal',

        'dobor-rozwiazania' =>
            'clipboard-choice',

        'uruchomienie-i-konfiguracja' =>
            'gear-wrench',

        'integracja-ze-sprzedaza' =>
            'plug-flow',

        'serwis-i-wsparcie' =>
            'headset-tools',
    );

    if (
        '' !== $title_slug
        && isset( $exact[ $title_slug ] )
    ) {
        return $exact[ $title_slug ];
    }

    $haystack = trim(
        $title_slug . '-' . $text_slug,
        '-'
    );

    $rules = array(
        'mail-shield' => array(
            'e-doreczen',
            'doreczen-elektronicz',
            'uwierzyteln',
            'identyfikac-uzytkownik',
        ),

        'shield-certificate' => array(
            'certyfikat',
            'bezpieczenstwo-danych',
            'ochrona-danych',
        ),

        'office-badge' => array(
            'punkt-partnerski',
            'certum',
            'punkt-obslugi',
        ),

        'car-route' => array(
            'dojazd',
            'siedzibie-firmy',
            'u-klienta',
        ),

        'dual-location' => array(
            'dwoch-lokaliz',
            'dwie-lokaliz',
            'dwoch-placow',
        ),

        'cash-register' => array(
            'kasa-fiskal',
            'kasy-fiskal',
        ),

        'receipt-printer' => array(
            'drukark-fiskal',
        ),

        'online-terminal' => array(
            'fiskaln-online',
            'repozytorium-kas',
            'crk',
        ),

        'clipboard-choice' => array(
            'dobor-rozwiaz',
            'dobor-urzadz',
            'analiz-potrzeb',
            'rekomend',
        ),

        'gear-wrench' => array(
            'uruchomien',
            'konfigurac',
            'przygotowujemy-urzadzenie',
        ),

        'plug-flow' => array(
            'integrac-ze-sprzedaz',
            'systemami-sprzedaz',
            'oprogramowaniem-sprzedaz',
        ),

        'headset-tools' => array(
            'serwis-i-wsparcie',
            'pomoc-technicz',
            'obsluge-serwis',
        ),

        'document-sign' => array(
            'podpis-elektronicz',
            'podpis-kwalifikowan',
        ),

        'workflow' => array(
            'cyfryzac',
            'obieg-dokument',
            'proces-firmow',
        ),
    );

    foreach ( $rules as $key => $keywords ) {
        foreach ( $keywords as $keyword ) {
            if (
                '' !== $haystack
                && false !== strpos(
                    $haystack,
                    $keyword
                )
            ) {
                return $key;
            }
        }
    }

    if (
        function_exists(
            'etos_get_service_icon_key_for_content'
        )
    ) {
        return etos_get_service_icon_key_for_content(
            $title,
            $text
        );
    }

    return 'service';
}

/**
 * Resolve an icon for a service card using title and description.
 *
 * Existing title rules take precedence. The weighted fallback is useful
 * especially for programming and integration services.
 *
 * @param string $title Card title.
 * @param string $text  Card description.
 * @return string
 */
function etos_get_service_icon_key_for_content(
    $title,
    $text = ''
) {
    $title_key = etos_get_inline_icon_key_for_title(
        $title
    );

    if ( 'service' !== $title_key ) {
        return $title_key;
    }

    $title_slug = sanitize_title(
        wp_strip_all_tags(
            (string) $title
        )
    );

    $text_slug = sanitize_title(
        wp_strip_all_tags(
            (string) $text
        )
    );

    $rules = array(
        'training' => array(
            'szkolen',
            'uczestnik',
            'program-dopasowan',
            'zakres-szkolen',
        ),
        'examples' => array(
            'przyklad',
            'scenariusz',
            'praktyczn',
            'rzeczywist',
        ),
        'trainer' => array(
            'trener',
            'prowadz-szkolen',
            'specjalist',
            'doswiadcz',
        ),
        'efficiency' => array(
            'sprawniejsz',
            'wykorzystanie-systemu',
            'ograniczyc-bled',
            'wykorzystac-funkc',
        ),
        'code' => array(
            'dedykowan',
            'rozszerzen',
            'modyfikac',
            'programist',
            'aplikac',
            'modul',
            'funkcj',
            'oprogram',
            'skrypt',
            'wtyczk',
            'plugin',
            'interfejs',
            'frontend',
            'backend',
        ),
        'integration' => array(
            'integrac',
            'api',
            'synchron',
            'polaczen',
            'systemami',
        ),
        'workflow' => array(
            'workflow',
            'obieg',
            'proces',
        ),
        'automation' => array(
            'automatyzac',
            'automatyz',
            'powtarzaln',
            'reczn',
        ),
        'analytics' => array(
            'raport',
            'dashboard',
            'analiz',
            'zestawien',
        ),
        'data-transfer' => array(
            'import',
            'eksport',
            'migrac',
            'wymian-danych',
        ),
        'database' => array(
            'baza-danych',
            'bazodan',
            'sql',
        ),
        'documents' => array(
            'dokument',
            'wydruk',
            'formularz',
        ),
    );

    $scores = array();

    foreach ( $rules as $key => $keywords ) {
        $scores[ $key ] = 0;

        foreach ( $keywords as $keyword ) {
            if (
                '' !== $title_slug
                && false !== strpos(
                    $title_slug,
                    $keyword
                )
            ) {
                $scores[ $key ] += 3;
            }

            if (
                '' !== $text_slug
                && false !== strpos(
                    $text_slug,
                    $keyword
                )
            ) {
                $scores[ $key ] += 1;
            }
        }
    }

    $priority = array(
        'integration' => array(
            'integrac',
            'api',
        ),
        'data-transfer' => array(
            'import',
            'eksport',
            'migrac',
        ),
        'database' => array(
            'baza-danych',
            'sql',
        ),
        'analytics' => array(
            'raport',
            'analiz',
        ),
        'workflow' => array(
            'workflow',
            'obieg',
        ),
        'automation' => array(
            'automatyzac',
            'automatyz',
        ),
        'code' => array(
            'dedykowan',
            'rozszerzen',
            'modyfikac',
            'programist',
        ),
    );

    foreach ( $priority as $key => $keywords ) {
        foreach ( $keywords as $keyword ) {
            if (
                '' !== $title_slug
                && false !== strpos(
                    $title_slug,
                    $keyword
                )
            ) {
                $scores[ $key ] += 5;
            }
        }
    }

    arsort(
        $scores,
        SORT_NUMERIC
    );

    $keys = array_keys(
        $scores
    );

    $best_key = $keys[0] ?? 'service';
    $best     = $scores[ $best_key ] ?? 0;

    return $best >= 2
        ? $best_key
        : 'service';
}

/**
 * Resolve an icon for service-care content.
 *
 * @param string $title Card title.
 * @param string $text  Card description.
 * @return string
 */
function etos_get_care_icon_key_for_content(
    $title,
    $text = ''
) {
    $content = sanitize_title(
        wp_strip_all_tags(
            (string) $title . ' ' . (string) $text
        )
    );

    /*
     * Stała umowa może również wspominać o awariach, dlatego
     * najpierw rozpoznajemy kontekst umowy serwisowej.
     */
    if (
        false !== strpos( $content, 'stala-umowa' )
        || false !== strpos( $content, 'umowa-serwis' )
        || false !== strpos( $content, 'regularn' )
        || false !== strpos( $content, 'priorytet' )
        || false !== strpos( $content, 'sla' )
        || false !== strpos( $content, 'przewidywaln' )
    ) {
        return 'contract';
    }

    if (
        false !== strpos( $content, 'incydent' )
        || false !== strpos( $content, 'sporadycz' )
        || false !== strpos( $content, 'konkretnym-zgloszen' )
        || false !== strpos( $content, 'bez-stalej-umowy' )
        || false !== strpos( $content, 'zglaszasz-problem' )
    ) {
        return 'incident';
    }

    if (
        false !== strpos( $content, 'monitoring' )
        || false !== strpos( $content, 'monitorow' )
    ) {
        return 'monitoring';
    }

    if (
        false !== strpos( $content, 'bezpiecz' )
        || false !== strpos( $content, 'uprawnien' )
    ) {
        return 'shield';
    }

    if (
        false !== strpos( $content, 'ciaglosc' )
        || false !== strpos( $content, 'dostepnosc' )
    ) {
        return 'uptime';
    }

    if (
        false !== strpos( $content, 'serwis' )
        || false !== strpos( $content, 'wsparci' )
        || false !== strpos( $content, 'opieka' )
        || false !== strpos( $content, 'helpdesk' )
        || false !== strpos( $content, 'zgloszen' )
    ) {
        return 'support';
    }

    return 'service';
}

/**
 * Normalize a hex color for CSS custom properties.
 *
 * @param string $color Color.
 * @return string
 */
function etos_normalize_icon_hex_color( $color ) {
    $color = sanitize_hex_color(
        (string) $color
    );

    if ( ! $color ) {
        return '#00A0E3';
    }

    if ( 4 === strlen( $color ) ) {
        return sprintf(
            '#%1$s%1$s%2$s%2$s%3$s%3$s',
            $color[1],
            $color[2],
            $color[3]
        );
    }

    return strtoupper( $color );
}

/**
 * Read the configured vendor accent color.
 *
 * @param WP_Term|int|null $term Vendor term.
 * @return string
 */
function etos_get_vendor_accent_color( $term = null ) {
    if ( null === $term ) {
        $term = get_queried_object();
    }

    if ( is_numeric( $term ) ) {
        $term = get_term(
            (int) $term,
            'etos_vendor'
        );
    }

    if (
        ! $term instanceof WP_Term
        || 'etos_vendor' !== $term->taxonomy
    ) {
        return '#00A0E3';
    }

    $accent = '';

    if ( function_exists( 'get_field' ) ) {
        $accent = (string) get_field(
            'etos_vendor_accent',
            'etos_vendor_' . $term->term_id
        );
    }

    if ( '' === trim( $accent ) ) {
        $accent = (string) get_term_meta(
            $term->term_id,
            'etos_vendor_accent',
            true
        );
    }

    return etos_normalize_icon_hex_color(
        $accent
    );
}

/**
 * Build a reusable ETOS icon badge.
 *
 * A manually selected ACF image may override the built-in SVG.
 *
 * @param string $key  Icon key.
 * @param array  $args Options.
 * @return string
 */
function etos_get_icon_badge( $key, $args = array() ) {
    $args = wp_parse_args(
        $args,
        array(
            'image_id' => 0,
            'size'     => 'md',
            'class'    => '',
            'accent'   => '',
        )
    );

    $allowed_sizes = array(
        'sm',
        'md',
        'lg',
    );

    $size = in_array(
        $args['size'],
        $allowed_sizes,
        true
    )
        ? $args['size']
        : 'md';

    $classes = array(
        'etos-icon-badge',
        'etos-icon-badge--' . $size,
    );

    if ( $args['class'] ) {
        foreach (
            preg_split(
                '/\s+/',
                trim( (string) $args['class'] )
            ) as $class
        ) {
            $class = sanitize_html_class(
                $class
            );

            if ( $class ) {
                $classes[] = $class;
            }
        }
    }

    $style = '';

    if ( $args['accent'] ) {
        $accent = etos_normalize_icon_hex_color(
            $args['accent']
        );

        $hex = ltrim(
            $accent,
            '#'
        );

        $style = sprintf(
            '--etos-icon-accent:%1$s;--etos-icon-border:#%2$s38;--etos-icon-bg:#%2$s0E;',
            $accent,
            $hex
        );
    }

    $content = '';

    $image_id = absint(
        $args['image_id']
    );

    if ( $image_id ) {
        $content = wp_get_attachment_image(
            $image_id,
            'thumbnail',
            false,
            array(
                'alt'     => '',
                'loading' => 'lazy',
            )
        );
    } else {
        $content = etos_get_inline_icon_svg(
            $key
        );
    }

    return sprintf(
        '<span class="%1$s"%2$s aria-hidden="true">%3$s</span>',
        esc_attr(
            implode(
                ' ',
                array_unique( $classes )
            )
        ),
        $style
            ? ' style="' . esc_attr( $style ) . '"'
            : '',
        $content
    );
}
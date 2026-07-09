<?php
defined( 'ABSPATH' ) || exit;

return array(
    'name'    => 'Symfonia ERP',
    'variant' => 'symfonia',
    'color'   => '#13B84A',
    'rgb'     => '19, 184, 74',
    'soft'  => '#EEF5FF',

    'hero' => array(
        'kicker' => 'Symfonia ERP',
        'title'  => 'System ERP dla finansów, kadr i uporządkowanych procesów.',
        'lead'   => 'Wdrażamy i rozwijamy Symfonię dla firm, które potrzebują kontroli nad księgowością, dokumentami, kadrami, płacami i raportowaniem.',
        'actions' => array(
            array(
                'label' => 'Umów konsultację',
                'url'   => '/kontakt/',
                'class' => 'btn etos-btn-primary',
            ),
            array(
                'label' => 'Zobacz moduły',
                'url'   => '#modules',
                'class' => 'btn etos-btn-secondary',
            ),
        ),
    ),

    'overview' => array(
        'kicker' => 'Dla firm, które potrzebują porządku w danych',
        'title'  => 'Symfonia pomaga uporządkować finanse, kadry i codzienną pracę organizacji.',
        'lead'   => 'Dobieramy moduły, konfigurujemy system, szkolimy użytkowników i wspieramy firmę po wdrożeniu. Dzięki temu Symfonia staje się realnym narzędziem pracy, a nie tylko kolejnym programem.',
        'items'  => array(
            'analiza procesów i dobór modułów',
            'wdrożenie, konfiguracja i migracja danych',
            'szkolenia użytkowników',
            'wsparcie powdrożeniowe i rozwój systemu',
        ),
    ),

    'modules' => array(
        'kicker' => 'Moduły Symfonii',
        'title'  => 'Dobieramy zakres systemu do procesów Twojej firmy.',
        'lead'   => 'Na start możesz prowadzić użytkownika do anchorów na tej samej stronie. Jeśli później powstaną osobne podstrony modułów, podmienisz tylko adresy URL.',
        'items'  => array(
            array(
                'id'    => 'modul-finanse',
                'name'  => 'Finanse i Księgowość',
                'text'  => 'Księgi, rozrachunki, dokumenty, podatki i raportowanie finansowe.',
                'url'   => '#modul-finanse',
            ),
            array(
                'id'    => 'modul-kadry-place',
                'name'  => 'Kadry i Płace',
                'text'  => 'Obsługa pracowników, wynagrodzeń, dokumentacji kadrowej i procesów płacowych.',
                'url'   => '#modul-kadry-place',
            ),
            array(
                'id'    => 'modul-handel-magazyn',
                'name'  => 'Handel i Magazyn',
                'text'  => 'Sprzedaż, zakupy, magazyn, kontrahenci, towary i dokumenty handlowe.',
                'url'   => '#modul-handel-magazyn',
            ),
            array(
                'id'    => 'modul-bi',
                'name'  => 'Business Intelligence',
                'text'  => 'Raporty, analizy i dane wspierające decyzje zarządcze.',
                'url'   => '#modul-bi',
            ),
            array(
                'id'    => 'modul-obieg-dokumentow',
                'name'  => 'Obieg dokumentów',
                'text'  => 'Porządkowanie akceptacji, przepływu faktur i dokumentów kosztowych.',
                'url'   => '#modul-obieg-dokumentow',
            ),
            array(
                'id'    => 'modul-ksef',
                'name'  => 'KSeF',
                'text'  => 'Przygotowanie procesów fakturowania i pracy użytkowników pod elektroniczną wymianę faktur.',
                'url'   => '#modul-ksef',
            ),
        ),
    ),

    'cta' => array(
        'eyebrow' => 'Symfonia ERP z ETOS',
        'title'   => 'Chcesz sprawdzić, jaki zakres Symfonii pasuje do Twojej firmy?',
        'text'    => 'Porozmawiajmy o procesach, modułach, wdrożeniu, szkoleniach i wsparciu po uruchomieniu.',
        'button'  => 'Umów konsultację',
        'url'     => '/kontakt/',
),
);
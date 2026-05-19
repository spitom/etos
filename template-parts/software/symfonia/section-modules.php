<?php
defined( 'ABSPATH' ) || exit;

$modules = array(
    array(
        'label' => 'Finanse',
        'title' => 'Finanse i Księgowość',
        'text'  => 'Pełniejsza kontrola ksiąg, rozrachunków, dokumentów, podatków i raportowania finansowego.',
    ),
    array(
        'label' => 'HR',
        'title' => 'Kadry i Płace',
        'text'  => 'Obsługa pracowników, wynagrodzeń, dokumentacji kadrowej i procesów płacowych.',
    ),
    array(
        'label' => 'Operacje',
        'title' => 'Handel i Magazyn',
        'text'  => 'Sprzedaż, zakupy, stany magazynowe, kontrahenci, towary i dokumenty handlowe.',
    ),
    array(
        'label' => 'Analityka',
        'title' => 'Business Intelligence',
        'text'  => 'Dane, raporty i analizy wspierające decyzje zarządcze oraz kontrolę procesów.',
    ),
    array(
        'label' => 'Dokumenty',
        'title' => 'Obieg dokumentów',
        'text'  => 'Porządkowanie akceptacji, przepływu faktur, dokumentów kosztowych i zadań.',
    ),
    array(
        'label' => 'Rozwój',
        'title' => 'Integracje i rozszerzenia',
        'text'  => 'Łączenie Symfonii z innymi systemami, narzędziami raportowymi i procesami firmy.',
    ),
);
?>

<section id="modules" class="software-section software-section--soft">
    <div class="container etos-container">
        <div class="row mb-5 g-4 align-items-end">
            <div class="col-lg-7">
                <span class="etos-kicker">Moduły Symfonii</span>
                <h2 class="software-section__title">
                    Dobieramy moduły do procesów, nie odwrotnie.
                </h2>
            </div>

            <div class="col-lg-5">
                <p class="software-section__lead">
                    Pomagamy dobrać zakres systemu do obecnego sposobu pracy firmy oraz planów rozwoju.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ( $modules as $module ) : ?>
                <div class="col-md-6 col-lg-4">
                    <article class="software-module-card">
                        <span><?php echo esc_html( $module['label'] ); ?></span>
                        <h3><?php echo esc_html( $module['title'] ); ?></h3>
                        <p><?php echo esc_html( $module['text'] ); ?></p>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
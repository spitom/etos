<?php
defined( 'ABSPATH' ) || exit;

$faq_items = array(
    array(
        'question' => 'Czy pomagacie dobrać właściwe moduły Symfonii?',
        'answer'   => 'Tak. Zaczynamy od analizy procesów i dopiero na tej podstawie rekomendujemy zakres modułów oraz sposób wdrożenia.',
    ),
    array(
        'question' => 'Czy wdrożenie obejmuje szkolenia użytkowników?',
        'answer'   => 'Tak. Szkolenia są prowadzone z myślą o konkretnych rolach w firmie i realnych procesach pracy.',
    ),
    array(
        'question' => 'Czy możecie przejąć opiekę nad działającą już Symfonią?',
        'answer'   => 'Tak. Możemy pomóc w uporządkowaniu konfiguracji, rozwoju systemu, wsparciu użytkowników i bieżącej administracji.',
    ),
    array(
        'question' => 'Czy wspieracie raportowanie i Business Intelligence?',
        'answer'   => 'Tak. Pomagamy wykorzystywać dane z systemu do raportów, analiz i kontroli kluczowych obszarów firmy.',
    ),
);
?>

<section class="software-section">
    <div class="container etos-container">
        <div class="row g-5">
            <div class="col-lg-5">
                <span class="etos-kicker">FAQ</span>
                <h2 class="software-section__title">
                    Najczęstsze pytania o wdrożenie Symfonii.
                </h2>
            </div>

            <div class="col-lg-7">
                <div class="accordion software-faq" id="softwareFaq">
                    <?php foreach ( $faq_items as $index => $item ) : ?>
                        <?php
                        $heading_id = 'software-faq-heading-' . $index;
                        $collapse_id = 'software-faq-collapse-' . $index;
                        ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
                                <button
                                    class="accordion-button <?php echo 0 === $index ? '' : 'collapsed'; ?>"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>"
                                    aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>"
                                    aria-controls="<?php echo esc_attr( $collapse_id ); ?>"
                                >
                                    <?php echo esc_html( $item['question'] ); ?>
                                </button>
                            </h3>
                            <div
                                id="<?php echo esc_attr( $collapse_id ); ?>"
                                class="accordion-collapse collapse <?php echo 0 === $index ? 'show' : ''; ?>"
                                aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
                                data-bs-parent="#softwareFaq"
                            >
                                <div class="accordion-body">
                                    <?php echo esc_html( $item['answer'] ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
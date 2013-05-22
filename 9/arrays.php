<?php
    include('html/header.html');
    include('scripts/utils.php');

    $count = isset($_POST['count']) && is_numeric($_POST['count'])
        ? intval($_POST['count'])
        : 0;
    $first_member = isset($_POST['first-member']) && is_numeric($_POST['first-member'])
        ? floatval($_POST['first-member'])
        : 0;
    $denominator = isset($_POST['denominator']) && is_numeric($_POST['denominator'])
        ? floatval($_POST['denominator'])
        : 0;

    $array = array(
        'fibonacci' => generate_fibonacci($count),
        'progression' => generate_progression($count, $first_member, $denominator)
    );
?>

<article>
    <section>
        <p><?=to_html($array)?></p>
    </section>
</article>

<?php
    include('html/footer.html');


<?php if(hasFlash('success')): ?>
    <?php
        $data = getFlash('success');
    ?>
    <script>
        sweetAlert("<?= $data['title'] ?>", "<?= $data['message'] ?>", "<?= $data['type'] ?>");
    </script>
<?php endif; ?>
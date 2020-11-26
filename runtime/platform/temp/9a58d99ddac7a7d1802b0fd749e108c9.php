<?php /*a:1:{s:49:"F:\WWW\yeshai\app\platform\view\public\notice.php";i:1583489943;}*/ ?>
<script>
    var $eb = parent._mpApi,back = <?=$backUrl?>;
    $eb.notice('<?php echo htmlentities($type); ?>',{
        title:'<?php echo htmlentities($msg); ?>',
        desc:'<?php echo htmlentities($info); ?>' || null,
        duration:<?=$duration?>
    });
    !!back ? (location.replace(back)) : history.go(-1);
</script>
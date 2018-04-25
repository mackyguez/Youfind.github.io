
<input type="" name="" id="a">

<script type="text/javascript">
    window.addEventListener('keydown', checkKeyPress, false);

    function checkKeyPress(key) {
        if(key.keyCode == 13) {
            document.getElementById('a').focus();
        }
    }
</script>
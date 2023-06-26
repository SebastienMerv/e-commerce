<script>const img = document.querySelector('img')
img.ondragstart = () => {
  return false;
};</script>

<script type="text/javascript">
        //<!--
                function ffalse()
                {
                        return false;
                }
                function ftrue()
                {
                        return true;
                }
                document.onselectstart = new Function ("return false");
                if(window.sidebar)
                {
                        document.onmousedown = ffalse;
                        document.onclick = ftrue;
                }
        //-->
    </script>
<script>
    $(document).ready(function(){
        $("#nilaiBrg, #nilaiSurut").keyup(function(){
            var nilaiBrg = $("#nilaiBrg").val();
            var nilaiSurut = $("#nilaiSurut").val();
            var nilaiBrgFormat = nilaiBrg.replace(/[^0-9]/g, '');
            var nilaiSurutFormat = nilaiSurut.replace(/[^0-9]/g, '');
            if (nilaiSurut !== '') {
                var nilaiTotal = parseInt(nilaiBrgFormat) * 1 - parseInt(nilaiSurutFormat);
            } else {
                var nilaiTotal = parseInt(nilaiBrgFormat) * 1;
            }
            $("#nilaiTotal").val(nilaiTotal);
        });
    });
        
</script>
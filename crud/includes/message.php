<?php
//sessão
session_start();
if(isset($_SESSION['mensagem'])): ?>
<script> // para estilizar a mensagem de alerta usando materialize css e js
    window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
    };
</script>
    

<?php
endif;
session_unset(); // para limpar a sessão e a msg ao atualizar a página
?>
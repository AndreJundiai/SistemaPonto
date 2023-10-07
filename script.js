<script>
    // Função para exibir uma mensagem de confirmação e enviar o formulário
    function confirmAndSubmit(action) {
        var confirmation = confirm("Tem certeza de que deseja registrar " + action + "?");
        if (confirmation) {
            document.forms[0].submit();
        }
    }

    // Função para mostrar uma mensagem de sucesso após o envio do formulário
    function showSuccessMessage(message) {
        alert(message);
    }

    // Event listener para os botões de registro
    var registroButtons = document.querySelectorAll('input[type="submit"]');
    registroButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Impedir o envio automático do formulário
            var action = event.target.value;
            confirmAndSubmit(action); // Chamar a função de confirmação e envio
        });
    });

    // Event listener para o link de download da planilha
    var downloadLink = document.querySelector('a[href="planilha.php"]');
    downloadLink.addEventListener('click', function(event) {
        event.preventDefault();
        // Adicione aqui a lógica para baixar a planilha
        // Por exemplo, redirecione o usuário para a página "planilha.php"
        window.location.href = "planilha.php";
    });
</script>

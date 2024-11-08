// script.js

document.addEventListener("DOMContentLoaded", () => {
    // Validação para o formulário de cadastro de usuário
    const formUsuario = document.querySelector("form[action='cadastro_usuario.php']");
    if (formUsuario) {
        formUsuario.addEventListener("submit", function(event) {
            const nome = document.getElementById("nome").value.trim();
            const email = document.getElementById("email").value.trim();
            
            // Valida se os campos estão preenchidos
            if (!nome || !email) {
                alert("Por favor, preencha todos os campos obrigatórios.");
                event.preventDefault();
                return;
            }

            // Validação de e-mail
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Por favor, insira um e-mail válido.");
                event.preventDefault();
            }
        });
    }

    // Validação para o formulário de cadastro de tarefas
    const formTarefa = document.querySelector("form[action='cadastro_tarefa.php']");
    if (formTarefa) {
        formTarefa.addEventListener("submit", function(event) {
            const descricao = document.getElementById("descricao").value.trim();
            const setor = document.getElementById("setor").value.trim();
            const prioridade = document.getElementById("prioridade").value;
            const usuarioId = document.getElementById("usuario_id").value;

            // Verifica se todos os campos estão preenchidos
            if (!descricao || !setor || !prioridade || !usuarioId) {
                alert("Por favor, preencha todos os campos obrigatórios.");
                event.preventDefault();
            }
        });
    }
});

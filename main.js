const express = require('express');
const bodyParser = require('body-parser');

const app = express();

// Configura o middleware para analisar dados do formulário
app.use(bodyParser.urlencoded({ extended: false }));

// Manipulador de rota para o envio do formulário
app.post('/enviar-formulario', (req, res) => {
  const nome = req.body.nome;
  const email = req.body.email;
  const mensagem = req.body.mensagem;

  // Processa os dados do formulário aqui

  // Envia uma resposta de sucesso para o navegador
  res.redirect('https://devtom.netlify.app/');
});

// Inicia o servidor
app.listen(3000, () => {
  console.log('Servidor iniciado na porta 3000');
});



const form = document.querySelector('form');
form.addEventListener('submit', enviarFormulario);

function enviarFormulario(event) {
    event.preventDefault(); // Previne o comportamento padrão de envio do formulário
  
    const formData = new FormData(event.target); // Obtém os dados do formulário
  
    fetch('srwashington.dev@gmail.com', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        alert('Formulário enviado com sucesso!');
      } else {
        throw new Error('Erro ao enviar formulário.');
      }
    })
    .catch(error => {
      console.error(error);
      alert('Erro ao enviar formulário. Por favor, tente novamente mais tarde.');
    });
  }
  
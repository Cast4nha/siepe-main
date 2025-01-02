const express = require('express');
const { GoogleGenerativeAI } = require('@google/generative-ai');
const cors = require('cors');
require('dotenv').config();

const app = express();
app.use(cors());
app.use(express.json());

const genAI = new GoogleGenerativeAI(process.env.GOOGLE_API_KEY);

// Função para formatar a resposta em estilo conversacional
function formatResponse(text) {
  // Remove asteriscos e substitui por pontos
  text = text.replace(/\*/g, '•');

  // Divide o texto em seções
  const sections = text.split('**');

  // Remove seções vazias
  const filteredSections = sections.filter(section => section.trim());

  // Formata cada seção
  let formattedText = filteredSections.map(section => {
    // Separa o título do conteúdo
    const [title, ...content] = section.split(':');

    if (!content.length) return section; // Se não há divisão título:conteúdo, retorna o texto original

    // Formata o conteúdo em parágrafos conversacionais
    const formattedContent = content.join(':')
      .split('•')
      .filter(item => item.trim())
      .map(item => item.trim())
      .join('\n\n');

    // Retorna o texto formatado
    return `Sobre ${title.trim()}:\n\n${formattedContent}`;
  }).join('\n\n');

  // Adiciona uma introdução amigável
  formattedText = `Deixa eu te explicar de forma mais clara:\n\n${formattedText}`;

  return formattedText;
}

app.get('/api/chat', (req, res) => {
  res.json({ message: 'Servidor Gemini AI está funcionando!' });
});

app.post('/api/chat', async (req, res) => {
  try {
    const { message } = req.body;

    if (!message) {
      return res.status(400).json({ error: 'Mensagem não fornecida' });
    }

    const model = genAI.getGenerativeModel({ model: "gemini-pro" });
    const result = await model.generateContent(message);
    const response = await result.response;
    const text = response.text();

    // Formata a resposta antes de enviar
    const formattedResponse = formatResponse(text);

    res.json({ response: formattedResponse });
  } catch (error) {
    console.error('Erro:', error);
    res.status(500).json({
      error: 'Erro ao processar a requisição',
      details: error.message
    });
  }
});

const PORT = process.env.PORT || 3001;
app.listen(PORT, () => {
  console.log(`Servidor rodando na porta ${PORT}`);
});
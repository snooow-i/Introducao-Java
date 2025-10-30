Introdução-Java

📖 Sobre o Projeto

Este repositório é uma coleção de estudos e projetos desenvolvidos em Java, focados em solidificar os conceitos da linguagem. O conteúdo abrange desde exercícios básicos de lógica de programação até a construção de uma aplicação desktop funcional com interface gráfica (GUI).

O projeto principal é uma Agenda de Contatos completa, que serve como uma implementação prática de conceitos de Programação Orientada a Objetos (POO), manipulação de eventos em Java Swing e persistência de dados.

✨ Projeto Principal: Agenda de Contatos (Swing)

O coração deste repositório é uma aplicação de CRUD (Create, Read, Update, Delete) para gerenciamento de contatos, construída inteiramente com Java Swing.

Arquivos: PrincipalAgenda.java, banner.jpeg

⚙️ Funcionalidades

Interface Gráfica (GUI): A aplicação possui uma interface de usuário completa construída com componentes Swing (JFrame, JPanel, JTable, JTextField, JButton), permitindo uma interação visual para gerenciar os contatos.

Operações CRUD:

Incluir: Adiciona novos contatos à agenda.

Consultar: Permite a busca de contatos por Código ou por Nome.

Alterar: Atualiza as informações de um contato existente.

Excluir: Remove um contato da agenda.

Persistência de Dados: A agenda salva e carrega os dados automaticamente em um arquivo binário (agenda.dat). Isso é feito através da Serialização de Objetos (ObjectOutputStream e ObjectInputStream), garantindo que os dados persistam entre as execuções da aplicação.

Visualização em Tabela: Todos os contatos são exibidos em uma JTable que é atualizada dinamicamente após cada operação, facilitando a visualização.

🚀 Exercícios e Conceitos Abordados

Além da agenda, o repositório contém uma vasta coleção de exercícios menores, cada um focado em um conceito específico do Java.

1. Lógica e Manipulação de Strings

Exercícios focados em entrada, saída e processamento de dados textuais.

AnexoA1.java: Validação de tamanho mínimo de string (10 caracteres).

AnexoA2.java: Iteração sobre os caracteres de uma string.

AnexoA3.java: Extração de substrings (substring(0, N)).

AnexoA4.java: Substituição de caracteres (troca de vogais por ?).

AnexoA5.java: Extração de caracteres numéricos de uma string.

AnexoA6.java: Verificação de prefixos de string (startsWith("http:")).

AnexoA13.java: Busca de substrings (contains("-help")).

2. Arrays, Coleções e Aleatoriedade
   
Demonstração do uso de estruturas de dados e geração de números aleatórios.

AnexoA10.java: Uso de HashSet para garantir a unicidade de 50 números aleatórios.

AnexoA11.java: Contagem de elementos (true) em um array de booleanos.

AnexoA12.java: Contagem de elementos (string.length() < 10) em um array de Strings.

Dado.java: Simulação de um dado de 6 faces usando Random.

3. Programação Orientada a Objetos (POO)
   
Classes que modelam entidades do mundo real e formas geométricas, aplicando os pilares da POO (encapsulamento, construtores e métodos).

Modelagem de Entidades
ContaPoupanca.java: Simula uma conta bancária com métodos para sacar() e depositar().

Pessoa.java / Paciente.java: Classes para calcular o IMC (Índice de Massa Corporal) e classificar a faixa de peso.

Funcionario.java / Funcionario2.java: Modelagem de funcionário com cálculos de salário, aumento, descontos de IRPF e INSS.

Triangulo.java: Classe complexa que calcula perímetro, área (Fórmula de Heron) e classifica o triângulo (Equilátero, Isósceles, Escaleno).

Modelagem Geométrica

AnexoA7.java: Cálculo da área do círculo.

Retangulo.java: Cálculo de área e perímetro.

Cilindro.java: Cálculo de área lateral, área total e volume.

Cone.java: Cálculo de geratriz, área lateral, área total e volume.

Esfera.java: Cálculo de área e volume.

Piramide.java: Cálculo de volume.

Paralelepipedo.java: Cálculo de volume e área.

🛠️ Como Compilar e Executar

Pré-requisitos
JDK (Java Development Kit) instalado e configurado no PATH do sistema.

1. Projeto Principal (Agenda de Contatos)
O arquivo banner.jpeg deve estar no mesmo diretório dos arquivos compilados (.class).

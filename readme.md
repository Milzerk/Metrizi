# Metrizi

Metrizi é um facilitador de contagem de pontos de função, onde poderá rastrear contagens e contabilizar o tamanho de um projeto

## Recursos

### Projeto
- Criar um projeto ( name, created_at, updated_at )
- Editar um projeto ( name, updated_at )

### Contagem
- Iniciar uma sessão de contagem em um [Projeto](#Projeto)
- Listar Contagens realizadas de um [Projeto](#projeto)
- Detalhar uma Contagem listando as funções de [dados](#Função-de-Dados)/[transação](#Função-de-Transação)
- Descartar Contagem
- Finalizar Contagem
	- Ao finalizar contagem, vincular todos as funções de dados/transação ao [Projeto](#Projeto)
	- Funções de dados/Transação com identificador repetido deve ser substituído pela nova versão, mantendo a versão antiga nas contagens anteriores. 

### Função de Dados
- Criar uma função de dados para uma [Contagem](#Contagem) em aberto
	- Deve conter um identificador único informado pelo o usuário (texto ou número)
- Adicionar Dados durante uma sessão de [contagem](#contagem)
- Adicionar Registros durante uma sessão de [Contagem](#Contagem)
- Listar Funções de Dados de um [Projeto](#Projeto)
	- Deve exibir apenas as funções de dados ativas, (ocultar as que já foram substituídas em [Contagem](#contagem) anteriores)
- Exibir histórico de uma função de dados presente em outras [contagens](#Contagem)
- Detalhar uma função de dados
### Função de Transação
- Criar uma função de transação para uma [Contagem](#Contagem) em aberto
	- Deve conter um identificador único informado pelo o usuário (texto ou número)
- Adicionar Dados durante uma sessão de [Contagem](#Contagem)
- Adicionar Arquivos Referenciados durante uma sessão de [Contagem](#Contagem)
- Listar Funções de Dados de um [Projeto](#Projeto)
	- Deve exibir apenas as funções de transação ativas, (ocultar as que já foram substituídas em [Contagem](#contagem) anteriores)
- Exibir histórico de uma função de transação presente em outras [contagens](#Contagem)
- Detalhar uma função de transação

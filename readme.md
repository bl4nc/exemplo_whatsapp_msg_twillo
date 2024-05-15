# Twilio WhatsApp Messaging Example

Este projeto é um exemplo simples de como enviar mensagens via WhatsApp usando a API do Twilio com PHP.

## Índice

- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Uso](#uso)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Exemplo de Código](#exemplo-de-código)
- [Referências](#referências)
- [Licença](#licença)

## Pré-requisitos

1. PHP instalado (versão 7.4 ou superior recomendada)
2. Composer instalado
3. Conta no Twilio com acesso à API de WhatsApp

## Instalação

1. Clone este repositório para o seu ambiente local:

    ```bash
    git clone https://github.com/seu-usuario/exemplo_whatsapp_msg_twillo.git
    cd exemplo_whatsapp_msg_twillo
    ```

2. Instale as dependências do projeto usando o Composer:

    ```bash
    composer install
    ```

3. Renomeie o arquivo `env.example` para `.env` e preencha com as suas credenciais do Twilio:

    ```plaintext
    TWILIO_SID=your_twilio_sid
    TWILIO_TOKEN=your_twilio_token
    ACCOUNT_SID=your_account_sid
    NUM_DESTINO=whatsapp:+1234567890
    NUM_TWILIO=whatsapp:+0987654321
    ```

    - `TWILIO_SID`: Seu SID da conta Twilio
    - `TWILIO_TOKEN`: Seu token de autenticação da Twilio
    - `ACCOUNT_SID`: Seu SID da conta (pode ser o mesmo que o `TWILIO_SID`)
    - `NUM_DESTINO`: O número de telefone de destino (incluindo `whatsapp:`)
    - `NUM_TWILIO`: O número de telefone do remetente registrado no Twilio (incluindo `whatsapp:`)

## Uso

Para enviar uma mensagem via WhatsApp, execute o script `index.php`:

```bash
php index.php
```

## Estrutura do projeto

```plaintext
.
├── index.php
├── composer.json
├── composer.lock
├── .env.example
└── vendor/
```

- index.php: Arquivo principal que envia a mensagem via WhatsApp.
- composer.json: Arquivo de configuração do Composer.
- composer.lock: Arquivo de bloqueio do Composer.
- .env.example: Exemplo de arquivo de configuração de ambiente.

## Exemplo de Código

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use Twilio\Rest\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$twilioSid    = $_ENV['TWILIO_SID'];
$twilioToken  = $_ENV['TWILIO_TOKEN'];
$accountSid  = $_ENV['ACCOUNT_SID'];
$NumDestino = $_ENV['NUM_DESTINO'];
$NumTwillo = $_ENV['NUM_TWILIO'];
$twilio = new Client($twilioSid, $twilioToken, $accountSid);
$mensagem = "Essa é a mensagem enviada";
$message = $twilio->messages
    ->create(
        "whatsapp:$NumDestino", 
        array(
            "from" => "whatsapp:$NumTwillo",
            "body" => $mensagem
        )
    );
```

## Referências

- [Twilio API Documentation](https://www.twilio.com/docs)
- [PHP dotenv Library](https://github.com/vlucas/phpdotenv)

## Licença
Este projeto é licenciado sob os termos da licença MIT. Veja o arquivo [LICENSE](LICENSE)
 para mais detalhes.

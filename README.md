# AI Agents for Laravel

Building with AI shouldn't be difficult, and AI Agents does its best to make it easy to build with AI inside of Laravel.

✍️ Spend more time writing code you care about, just provide comments and let the system take care of the rest!

📦 Agents are highly composable . Simply include the trait you need to give your AI the right capabilities for the job.

```php
class TextingAgent extends BaseAgent {

    use \CaiqueBispo\AiAgentsLaravel\AgentTraits\DateTrait; // Access to date functions

    public string $prePrompt = "You are a helpful assistant";   // Pre-prompt
}
```

🔧 Need custom functionality or have an idea for a new AgentTrait? Create your own! Just follow the comment structure and the system will do the rest to ensure the AI understand and can use your functions!

```php
/**
* @aiagent-description Adds two numbers together
* @param int $a
* @param int $b
* @return int
*/
public function add(int $a, int $b): int {
    return $a + $b;
}
```


🚀 Create a new AI Agent in <20 lines of code!

# Table of Contents
- [🔧 Setup](#-setup)
- [👨‍💻 Usage](#-usage)
  - [In Console/Testing](#in-consoletesting)
  - [In Code](#in-code)
- [🤖 Creating a new agent](#-creating-a-new-agent)
  - [Defining an agent function](#defining-an-agent-function)
- [🧰 Agent Traits](#-agent-traits)
- [📝 Chat Models](#-chat-models)
  - [Currently Supported](#currently-supported)
  - [Adding a new chat model](#adding-a-new-chat-model)
- [❤️ Contributing](#️-contributing)

## 🔧 Setup 

Install via composer

`composer require caiquebispo/ai-agents-laravel`

You will need to publish the configuration files and fill out details based on the features you wish to use. You can publish the config files by running the following command:

`php artisan vendor:publish --provider="CaiqueBispo\AiAgentsLaravel\AiAgentsLaravelServiceProvider"`

### In Code

```php
$chat = new \CaiqueBispo\AiAgentsLaravel\ChatModels\ChatGPT();

$agent = new \CaiqueBispo\AiAgentsLaravel\Agents\TestingAgent($chat); // Ensures the agent gets a pre-prompt at creation
$agent->ask("Hello, is this thing on?"); // Yes, I'm here. How can I assist you today?
```

## 🤖 Creating a new agent 
To create a new agent you will want to extend the `BaseAgent` class and define any additional functionality.

**NOTE: If you want to require your agent to always call a function, you can extend the `FunctionsAgent` instead!**

The `prePrompt` property is the pre-prompt that is passed to the chat model. This should describe how you want the agent to think and act.

You can use traits under `AgentTraits` to pull in specific functionality you may need.
**This is the total code required to create an agent.**
```php
class TestingAgent extends BaseAgent {

    use \CaiqueBispo\AiAgentsLaravel\AgentTraits\DateTrait;  // Access to date functions

    public string $prePrompt = "You are a helpful assistant";   // Pre-prompt
}
```

### Defining an agent function
To define an agent function, you should follow php DocBlock to describe the params, return type, and method.

For the agent to have access to the function, you must include an additional PHPDoc block param called `@aiagent-description`. This must be a string that describes the function. Any functions that include that property in the agent's class will automatically be made available to the agent.

Example of the `add` function:
```php
    /**
     * @param int $a
     * @param int $b
     * @return int
     * @aiagent-description Adds two numbers together
     */
    public function add(int $a, int $b): int {
        return $a + $b;
    }
```

## 🧰 Agent Traits
Agent Traits can be used to plug and play functionality for an agent. Some are included in this package under the `AgentTraits` namespace.

`DateTrait` - Provides access to date functions (i.e. `compareDates` or `getCurrentDate`)

It is highly encouraged that you place re-usable functions in a trait, and then pull that trait into your agent.


## 📝 Chat Models

### Currently Supported
- GPT-3.5-turbo
- GPT-4

### Adding a new chat model
New models can be added by extending `AbstractChatModel`. This class provides the basic functionality required to interact with the chat model.

## ❤️ Contributing
Opening new issues is encouraged if you have any questions, issues, or ideas.


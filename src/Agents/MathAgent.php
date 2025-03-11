<?php

namespace CaiqueBispo\AiAgentsLaravel\Agents;

class MathAgent extends BaseAgent {

    use \CaiqueBispo\AiAgentsLaravel\AgentTraits\MathTrait;

    public $prePrompt = "You are a helpful assistant with a specailization in math.";    

}
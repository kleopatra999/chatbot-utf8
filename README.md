# chatbot-utf8

chatbot for languages have to support utf8 

you can use https://github.com/kompasim/AIML-Uyghur to customize for Uyghur language

it is bases on https://github.com/pe77/Program-P and AIML 2.5

![chatbot](/images/demo.png)

> the pattern rule :

```PHP
		$pattern = str_replace(' * ', ' (.+) ', $pattern);
		$pattern = str_replace('* ', '(.+) ', $pattern);
		$pattern = str_replace(' *', ' (.+)', $pattern);
		$pattern = str_replace('*', '(.+)', $pattern);
		$pattern = str_replace(' # ', '[ ]*(.*) ', $pattern);
		$pattern = str_replace(' #', '[ ]*(.*)', $pattern);
		$pattern = str_replace('# ', '(.*)[ ]*', $pattern);
		$pattern = str_replace('#', '(.*)', $pattern);
```
> usage :

1. create config.php based on config.sample.php and edit db informations

2. inport programp.sql to your database

3. open www in browser

4. use api.php?requestType=talk&input=ياخشىمۇسىز to rest api

5. cusomize your aiml files and include in aiml/chatbot.aiml

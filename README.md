#  基于AIML的PHP连天机器人

## 0. 介绍

> 该聊天机器人是基于AIML 2.5，对[Program-P](https://github.com/pe77/Program-P)做一些小的修改而成的，感兴趣的朋友可以自己再研究一下。

> 该聊天机器人也适用于UTF-8编码的，单词后缀根据不用的时态而改变的那些语言。

## 1. 下载安装

> `git clone https://github.com/kompasim/chatbot-utf8.git`，下载之后完成下面那些步骤就可以直接上传到自己的服务器了。

## 2. 数据库的配置

> 数据库用到了MySQL，也可以根据自己的需求选择不同关系数据库，我们把config.sample.php复制一份重命名为config.php，并且在里面填写数据库有关信息。

## 3. 导入数据库备份文件

> 把根目录中的programp.sql导入到数据库，里面是存储聊天机器人的配置信息，请求记录等信息的表。

## 4. 添加个性化语料库

> 我们把aiml/chatbot.aiml打开编辑，添加我们个性化的语料库，下载之后里面有aiml的简单实用方法，更多信息可以在[alicebot](http://www.alicebot.org/aiml.html)阅读理解，如果想尝试英文聊天机器人可以用[aiml-en-us-foundation-alice](https://github.com/drwallace/aiml-en-us-foundation-alice)。我们可以吧编辑好的aiml直接覆盖吗，过着把新的aiml文件include到chatbot.aiml。

## 5. 测试聊天机器人

> 打开imdex.php之后可以测试我们刚刚添加的语料库。

## 6. 调用api

> 如果希望在公众号或者自己的APP里面调用聊天机器人我们可以这样调用它的api `api.php?requestType=talk&input=你好`

## 7. 关于个性化之后的aiml匹配规则

> 修改之后的匹配规则 :

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

## 8. 项目github地址

> [https://github.com/kompasim/chatbot-utf8](https://github.com/kompasim/chatbot-utf8)

![chatbot](/images/demo.png)
#Sticky Menu jQuery plugin

Версия: **1.1.1**

###Для чего плагин?
* Плагин постоянно отображает на экране указанное меню, его иначе называют "Липким меню".

![jQuery Sticky Menu Plugin](http://files.fater.ru/git/jquery-stickymenu/1.gif)

##Зависимости
* **jQuery** - необходимая библиотека для работы модуля

##Установка с помощью Bower
```
$> bower install jquery-stickymenu --save
```
Происходит установка плагина. В текущем пакете есть зависимость jQuery. Если jQuery не были установлены через bower, он установится вместе с плагином ScrollToTop. 


###Как подключить плагин

Подключите файлы в HTML проект:
```html
// Stickymenu плагин
<script src="url-to-module/jquery-stickymenu/dist/jquery.stickymenu.min.js"></script>

// JQuery
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
```

###Как использовать плагин
```html
<div style="position: relative; overflow: hidden;">
	<div id="stickymenu">
		...
	</div>
</div>
```


##Описание параметров
```js
$.stickymenu ({object}); 
```
Тип входящих данных: JSON:

* **object_id** - ID объекта плавающего меню;
* **standoff** - отступ плавающего меню от верхней границы экрана;
* **standoff_object_id** - отступ плавающего меню относительно такого же плавающего меню.


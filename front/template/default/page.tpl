
<!DOCTYPE html>
<html lang="{$langon}">
<head>
    {include file="{$incfile.metatag}" title=title}
    {include file="{$incfile.style}" title=title}
</head>
    <body>
    {include file="{$incfile.preloader}" title=title}
    <div class="global-container">
        {include file="{$incfile.header}" title=title}
        {include file="{$fileInclude|templateInclude:$settemplate}" title=pageContent}
        {include file="{$incfile.footer}" title=title}
    </div>
    {include file="{$incfile.loadscript}" title=title}
    {include file="{$incfile.modal}" title=title}
    </body>
</html>
//

document.write('<h1>From Javascript</h1>');

div = document.createElement('div');
text = document.createTextNode('My Div Content');
div.appendChild(text);
document.body.appendChild(div);


div.innerHTML = '<h3>New Content</h3>';

function showAlert() {
const msg = document.createElement('div');
msg.className = 'popup';
msg.innerHTML = '✨ Haloo Aku Elis';
document.body.appendChild(msg);


setTimeout(() => msg.remove(), 3000);
}


/* popup style injected */
const style = document.createElement('style');
style.innerHTML = `
.popup{
position:fixed;bottom:30px;right:30px;
background:#000000aa;color:#fff;
padding:14px 20px;border-radius:12px;
animation:fadeUp .5s ease;
}
`;
document.head.appendChild(style);
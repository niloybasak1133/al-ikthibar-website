const sl=[...document.querySelectorAll('.slide')],dots=document.querySelector('.dots');let i=0,tm;
if(sl.length){sl.forEach((_,k)=>{const d=document.createElement('button');d.onclick=()=>go(k);dots.append(d)});
function go(n){i=(n+sl.length)%sl.length;sl.forEach((s,k)=>s.classList.toggle('active',k==i));[...dots.children].forEach((d,k)=>d.classList.toggle('on',k==i));clearInterval(tm);tm=setInterval(()=>go(i+1),5500)}
document.querySelectorAll('.arr').forEach(b=>b.onclick=()=>go(i+ +b.dataset.d));go(0)}
document.querySelectorAll('[data-n]').forEach(el=>{const m=el.dataset.n.match(/^(\d+)(.*)$/);if(!m||matchMedia('(prefers-reduced-motion:reduce)').matches)return;
new IntersectionObserver((e,o)=>{if(!e[0].isIntersecting)return;o.disconnect();let t=0;const T=+m[1],s=setInterval(()=>{t+=Math.ceil(T/30);if(t>=T){t=T;clearInterval(s)}el.textContent=t+m[2]},30)}).observe(el)});

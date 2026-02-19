const fields = document.querySelectorAll('.track');
const bar = document.getElementById('bar');
const btn = document.getElementById('btnZapisz');

function isFilled(el) {
    if (el.tagName.toLowerCase() === 'select') {
        return el.value.trim() !== '';
    }

    if (el.type === 'checkbox') {
        return el.checked;
    }

    return el.value.trim() !== '';
}

function updateProgress() {
    const total = fields.length;

    let filled = 0;
    fields.forEach((el) => {
        if(isFilled(el)) filled++;
    });

    let percent = Math.round((filled / total) * 100);


    let currentWidth = parseInt(bar.style.width) || 0;

    if (percent > 100) percent = 100;

    bar.style.width = percent + '%';
    bar.textContent = percent + '%';

    btn.disabled = percent < 100;
}

fields.forEach((el) => {
    el.addEventListener('blur', updateProgress);
    el.addEventListener('change', updateProgress);
    el.addEventListener('input', updateProgress);
});

updateProgress();


// RIPPLE EFFECT on button click
btn.addEventListener("click", function(e){
  const circle = document.createElement("span");
  circle.classList.add("ripple");

  const rect = btn.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height);

  circle.style.width = circle.style.height = size + "px";
  circle.style.left = (e.clientX - rect.left - size/2) + "px";
  circle.style.top  = (e.clientY - rect.top  - size/2) + "px";

  btn.appendChild(circle);

  setTimeout(() => circle.remove(), 650);
});

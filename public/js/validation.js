document.addEventListener('DOMContentLoaded', function () {

  const rules = {
    title: [
      { test: v => v.trim().length > 0,    msg: 'O título é obrigatório.' },
      { test: v => v.trim().length >= 3,   msg: 'O título deve ter pelo menos 3 caracteres.' },
      { test: v => v.trim().length <= 120, msg: 'O título deve ter no máximo 120 caracteres.' }
    ],
    description: [
      { test: v => v.trim().length > 0,   msg: 'A descrição é obrigatória.' },
      { test: v => v.trim().length >= 10, msg: 'A descrição deve ter pelo menos 10 caracteres.' }
    ],
    event_date: [
      { test: v => v !== '',               msg: 'A data e hora são obrigatórias.' },
      { test: v => new Date(v) > new Date(), msg: 'A data deve ser no futuro.' }
    ]
  };

  function validateField(name) {
    const el    = document.getElementById(name);
    const errEl = document.getElementById('err-' + name);
    for (const rule of rules[name]) {
      if (!rule.test(el.value)) {
        el.classList.add('error');
        errEl.textContent = rule.msg;
        errEl.style.display = 'block';
        return false;
      }
    }
    el.classList.remove('error');
    errEl.style.display = 'none';
    return true;
  }

  Object.keys(rules).forEach(name => {
    const el = document.getElementById(name);
    if(!el) return;
    el.addEventListener('blur',  () => validateField(name));
    el.addEventListener('input', () => { if (el.classList.contains('error')) validateField(name); });
  });

  const form = document.getElementById('form-agenda');
  
  if(form) {
      form.addEventListener('submit', e => {
        const valid = Object.keys(rules).map(validateField).every(Boolean);
        if (!valid) e.preventDefault();
      });
  }

});
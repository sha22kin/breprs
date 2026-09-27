/**
 * ==========================================================================
 * GREEN EARTH NGO - GOOGLE TRANSLATOR INTEGRATION
 * Premium language selector dropdown with persistent state (Clean & Valid)
 * ==========================================================================
 */

(function () {
  // 1. Initialize Google Translate Element globally (without Simple layout, creating hidden combobox select)
  window.googleTranslateElementInit = function () {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,bn',
      autoDisplay: false
    }, 'google_translate_element');
  };

  // Inject hidden Translate element container into document body
  const translateDiv = document.createElement('div');
  translateDiv.id = 'google_translate_element';
  document.body.appendChild(translateDiv);

  // Load Google Translate API Script (explicitly use https to work under file:/// and http:// protocols)
  const gtScript = document.createElement('script');
  gtScript.type = 'text/javascript';
  gtScript.async = true;
  gtScript.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
  document.head.appendChild(gtScript);

  // 2. Programmatic Translation helper using standard select combobox
  function translateTo(langCode) {
    const checkComboInterval = setInterval(() => {
      const googleCombo = document.querySelector('.goog-te-combo');
      if (googleCombo) {
        googleCombo.value = langCode;
        googleCombo.dispatchEvent(new Event('change'));
        clearInterval(checkComboInterval);
      }
    }, 100);

    // Timeout safety net (10 seconds)
    setTimeout(() => clearInterval(checkComboInterval), 10000);
  }

  // Helper to toggle active classes and update toggle button label
  function updateActiveLanguageUI(lang) {
    const labelSpan = document.getElementById('currentLangLabel');
    if (labelSpan) {
      labelSpan.textContent = lang === 'bn' ? 'Bn' : 'En';
    }

    document.querySelectorAll('.lang-select-btn').forEach(btn => {
      if (btn.getAttribute('data-lang') === lang) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });
  }

  // 3. Render Custom Language Dropdown in the Navbar (using class lists, absolutely zero inline styles)
  function renderDropdown() {
    const langContainer = document.querySelector('.navbar-ngo .navbar-nav');
    if (!langContainer) return;

    // Check if dropdown is already rendered to avoid duplicate injections
    if (document.getElementById('langSelectorDropdown')) return;

    const navItem = document.createElement('li');
    navItem.className = 'nav-item dropdown ms-lg-2 notranslate';
    navItem.setAttribute('translate', 'no');
    navItem.innerHTML = `
      <a class="nav-link dropdown-toggle lang-dropdown-btn notranslate" href="#" id="langSelectorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" translate="no">
        <i class="fas fa-globe lang-dropdown-icon"></i>
        <span id="currentLangLabel" class="notranslate" translate="no">En</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end border-0 shadow lang-dropdown-menu notranslate" aria-labelledby="langSelectorDropdown" translate="no">
        <li><a class="dropdown-item lang-select-btn lang-dropdown-item notranslate" data-lang="en" translate="no">English (En)</a></li>
        <li><a class="dropdown-item lang-select-btn lang-dropdown-item notranslate" data-lang="bn" translate="no">বাংলা (Bn)</a></li>
      </ul>
    `;

    // Insert dropdown right before the action button ("Join Us")
    const actionBtn = langContainer.querySelector('.navbar-action-btn')?.parentElement;
    if (actionBtn) {
      langContainer.insertBefore(navItem, actionBtn);
    } else {
      langContainer.appendChild(navItem);
    }

    // Set active language from localStorage on initialization
    const savedLang = localStorage.getItem('ngo_selected_lang') || 'en';
    updateActiveLanguageUI(savedLang);

    // Event listener for language selection buttons
    langItemClicks();
  }

  function langItemClicks() {
    document.querySelectorAll('.lang-select-btn').forEach(btn => {
      // Remove any existing click listener just in case
      btn.removeEventListener('click', handleLangSelection);
      btn.addEventListener('click', handleLangSelection);
    });
  }

  function handleLangSelection(e) {
    e.preventDefault();
    const selectedLang = this.getAttribute('data-lang');
    localStorage.setItem('ngo_selected_lang', selectedLang);
    updateActiveLanguageUI(selectedLang);
    translateTo(selectedLang);
  }

  // 4. Initial setup and listeners
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      renderDropdown();
      const savedLang = localStorage.getItem('ngo_selected_lang');
      if (savedLang && savedLang !== 'en') {
        translateTo(savedLang);
      }
    });
  } else {
    renderDropdown();
    const savedLang = localStorage.getItem('ngo_selected_lang');
    if (savedLang && savedLang !== 'en') {
      translateTo(savedLang);
    }
  }
})();

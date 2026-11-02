(function () {
    const root = document.documentElement;
    const system = window.matchMedia('(prefers-color-scheme: dark)');
    let preference = null;

    try {
        const saved = localStorage.getItem('theme');
        if (saved === 'light' || saved === 'dark') {
            preference = saved;
        }
    } catch (error) {
        // The switch still works when browser storage is unavailable.
    }

    function apply(theme) {
        let nextMode;
        let label;

        if (theme === 'dark') {
            root.classList.add('dark');
            nextMode = 'light';
            label = 'Dark';
        } else {
            root.classList.remove('dark');
            nextMode = 'dark';
            label = 'Light';
        }

        root.style.colorScheme = theme;
        const buttons = document.querySelectorAll('[data-theme-toggle]');

        for (const button of buttons) {
            button.setAttribute('aria-label', 'Switch to ' + nextMode + ' mode');
            button.querySelector('[data-theme-label]').textContent = label;
        }
    }

    function applySystemTheme() {
        if (system.matches) {
            apply('dark');
        } else {
            apply('light');
        }
    }

    if (preference !== null) {
        apply(preference);
    } else {
        applySystemTheme();
    }

    system.addEventListener('change', function () {
        if (preference === null) {
            applySystemTheme();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        if (root.classList.contains('dark')) {
            apply('dark');
        } else {
            apply('light');
        }

        const buttons = document.querySelectorAll('[data-theme-toggle]');

        for (const button of buttons) {
            button.addEventListener('click', function () {
                if (root.classList.contains('dark')) {
                    preference = 'light';
                } else {
                    preference = 'dark';
                }

                try {
                    localStorage.setItem('theme', preference);
                } catch (error) {
                    // Keep the selected mode for this page even without storage.
                }

                apply(preference);
            });
        }
    });
})();

/**
 * ---------------------------------------------------------------------------
 * plan.js - what is shown above the settings, and the tabs for the plan
 * ---------------------------------------------------------------------------
 *   free plan  -> "Upgrade to Paid Plan" banner   (#free_plan_upgrade_block); its links
 *                 carry the website, email and name (upgradeLinks)
 *   paid plan  -> paid card with "Dashboard"      (#paid_plan_block)
 * plus the "Widget installed on <domain>" line.
 * Tabs (AIOA.tabs.setPlan): a paid plan starts with Accessibility Score;
 * on the free plan Paid Features and Accessibility Score are locked.
 */
(function (AIOA, document) {
  'use strict';

  const { $, $$ } = AIOA.util;
  const state = AIOA.state;
  const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  /**
   * "Upgrade to Paid Plan" links (the banner and the lock overlays, [data-upgrade-link]):
   * add what the trial form can fill in, for example
   *   …/trial-subscription?website=example.com&email=dev@example.com&first_name=Jane&last_name=Doe
   * website is the website shown, email the admin's email (only a valid one), first_name the
   * first word of the admin's name and last_name the rest. Empty values are left out.
   */
  function upgradeLinks() {
    const name = String(AIOA.boot.name || '').trim().split(/\s+/).filter(Boolean);
    const email = String(AIOA.boot.email || '').trim();
    const query = [
      ['website', state.activeDomain],
      ['email', EMAIL_RE.test(email) ? email : ''],
      ['first_name', name[0] || ''],
      ['last_name', name.slice(1).join(' ')]
    ]
      .filter((pair) => pair[1] !== '')
      .map((pair) => pair[0] + '=' + encodeURIComponent(pair[1]).replace(/%40/g, '@'))
      .join('&');

    if (query) {
      $$('a[data-upgrade-link]').forEach((link) => {
        const base = link.getAttribute('href');
        link.setAttribute('href', base + (base.includes('?') ? '&' : '?') + query);
      });
    }
  }

  upgradeLinks();

  AIOA.plan = {
    /**
     * @param {number|string} is_free_widget from the widget settings response: 1 = free plan, anything else = paid plan
     */
    render(is_free_widget) {
      state.isPaid = parseInt(is_free_widget, 10) !== 1;

      $('#free_plan_upgrade_block').hidden = state.isPaid;
      $('#paid_plan_block').hidden = !state.isPaid;
      AIOA.tabs.setPlan(state.isPaid);

      const domain = document.createElement('strong');
      domain.textContent = state.activeDomain;
      $('#site-text').replaceChildren('Widget installed on ', domain);
    }
  };
})(window.AIOA, document);

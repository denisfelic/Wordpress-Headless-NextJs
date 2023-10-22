import { Section } from "./filter-with-loadmore";

const FaqFilterComponent = () => {
  let activesIdsList = [];

  function init() {
    const $allFaqButtons = document.querySelectorAll('[data-js="faq-btn"]');

    $allFaqButtons.forEach(faqButton => {
      faqButton.addEventListener('click', () => {
        handleToggleFaq(faqButton);
      });
    });

    document.querySelector('[data-js="faq-clear"]')
      .addEventListener('click', () => {
        
      })
  }


  function handleToggleFaq(faqButton) {
    faqButton.classList.toggle('active');

    const inArr = activesIdsList.findIndex(e => e == faqButton.dataset.jsFaqBtnId)
    handleFaqButtonIdInActivesArr(inArr, faqButton)
    handleShowFaqsSection();

    // none selected
    if (activesIdsList.length == 0) {
      showAllFaqs();
    }
  }

  /**
   * Toggle clicked faq button
   */
  function handleFaqButtonIdInActivesArr(inArray, faqButton) {
    if (inArray == -1) {
      activesIdsList.push(faqButton.dataset.jsFaqBtnId)
    } else {
      activesIdsList = activesIdsList.filter(e => e != faqButton.dataset.jsFaqBtnId)
    }
  }

  /**
   * Show and hide faqs section
   *
   * @return void
   */
  function handleShowFaqsSection() {
    document.querySelectorAll('[data-js-faq-section-id]')
      .forEach(faqSection => {
        const inArr = activesIdsList.findIndex(e => e == faqSection.dataset.jsFaqSectionId);

        if (inArr == -1) {
          faqSection.classList.add('hidden')
        } else {
          faqSection.classList.remove('hidden')
        }
      });
  }

  /**
   * Show All faqs questions
   *
   * @return void
   */
  function showAllFaqs() {
    document.querySelectorAll('[data-js-faq-section-id]')
      .forEach(faqSection => {
        faqSection.classList.remove('hidden')
      });
  }
  return {
    init
  }
}


export { FaqFilterComponent }
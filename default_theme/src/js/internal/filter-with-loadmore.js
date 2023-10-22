export function Section(sectionId) {
  if (!document.querySelector(sectionId)){
    return;
  }
  
  let rangeList = [];
  const elementsIds = {
    sectionDataAttrName: 'data-js-doc-section-id',
    sectionItemDataAttrName: 'data-js-doc-list-section-id',
    loadMoreButtonDataAttrName: 'data-js-doc-list-button-id',
  };

  /**
   * Handle pagination 
   */
  const LoadMore = () => {
    const rangeOffset = 5;


    function init() {

      addPagination();
      toggleShowMorePaginationButtons();

    }

    function addPagination() {
      document.querySelectorAll(`${sectionId} [${elementsIds.sectionDataAttrName}]`).forEach(el => {
        
        const $docs = el.querySelectorAll(`[${elementsIds.sectionItemDataAttrName}]`);
        $docs.forEach(element => {
          element.classList.add('hidden');
        });
        // hide button show more
        if ($docs.length <= rangeOffset) {
          const $buttonElement = el.querySelector(`[${elementsIds.loadMoreButtonDataAttrName}="${el.dataset.jsDocSectionId}"]`)
          $buttonElement.classList.add('hidden')
        }

        rangeList.push({
          range: rangeOffset,
          id: el.dataset.jsDocSectionId
        });

        const $docsToHide = Array.from($docs).splice(0, rangeOffset)
        $docsToHide.forEach(element => {
          element.classList.remove('hidden');
        });
      });
    }

    function toggleShowMorePaginationButtons() {
      document.querySelectorAll(`${sectionId} [${elementsIds.loadMoreButtonDataAttrName}]`)
        .forEach(buttonElement => {
          buttonElement.addEventListener('click', (e) => {
            e.preventDefault();
            handlePaginateButtonClick(buttonElement)
          });
        });

    }

    function handlePaginateButtonClick(buttonElement) {
      const findedIndex = rangeList.findIndex(e => e.id == buttonElement.dataset.jsDocListButtonId);
      rangeList[findedIndex].range += rangeOffset;
      const $docs = document.querySelectorAll(`${sectionId} [${elementsIds.sectionDataAttrName}="${buttonElement.dataset.jsDocListButtonId}"] [${elementsIds.sectionItemDataAttrName}]`);

      const $docsToShow = Array.from($docs).splice(0, rangeList[findedIndex].range)
      $docsToShow.forEach(element => {
        element.classList.remove('hidden');
      });
      if ($docsToShow.length == $docs.length) {
        buttonElement.classList.add('hidden')
      }
    }

    function reset() {

      rangeList = []
      addPagination()


      document.querySelectorAll(`${sectionId} [${elementsIds.loadMoreButtonDataAttrName}]`)
        .forEach(buttonElement => {
          const $docs = document.querySelectorAll(`${sectionId} [${elementsIds.sectionDataAttrName}="${buttonElement.dataset.jsDocListButtonId}"] [${elementsIds.sectionItemDataAttrName}]`);

          const $docsToShow = Array.from($docs).splice(0, rangeOffset)
          if ($docsToShow.length == $docs.length) {
            buttonElement.classList.add('hidden')
          } else {
            buttonElement.classList.remove('hidden')
          }
        });

    }



    return {
      init,
      reset,
    }
  }

  /**
   * Handle filter of document sections 
   */
  function DocumentHeaderFilter() {
    const ids = {

    }
    // state of current filtered sections
    let toggledSections = [];

    function init() {
      handleFilterButtons();
      handleResetFilter();

    }

    /**
     * Handle buttons
     */
    function handleFilterButtons() {
      // all sections
      const $sections = document.querySelectorAll(`${sectionId} [data-js-section-topic-id]`);

      document.querySelectorAll(`${sectionId} [data-js-document-list-filter-btns]`)
        .forEach(filterButton => {
          // current button ID
          const buttonId = filterButton.dataset.jsDocumentListFilterBtns;


          filterButton.addEventListener('click', (e) => {
            e.stopPropagation();
            // remove active from "Show all"
            document.querySelector(`${sectionId} [data-js="document-filter-reset-btn"]`)
            .classList.remove('active');

            LoadMore({
              sectionDataAttrName: 'data-js-doc-section-id',
              sectionItemDataAttrName: 'data-js-doc-list-section-id',
              loadMoreButtonDataAttrName: 'data-js-doc-list-button-id',

            }).reset();

            // toggle current section logic
            const findedIndex = toggledSections.findIndex(i => i == buttonId);
            if (findedIndex == -1) {
              toggledSections.push(buttonId);
              filterButton.classList.add('active')

            } else {
              toggledSections = toggledSections.filter(e => e != buttonId)
              filterButton.classList.remove('active');
            }

            // show/hide sections
            $sections.forEach(el => {

              // default hide all sections
              el.classList.add('hidden')

              const sectionTopicId = el.dataset.jsSectionTopicId;

              const findedSectionIndex = toggledSections.findIndex(i => i == sectionTopicId);

              // show/hide sections if is in array of toggled sections
              if (findedSectionIndex != -1) {
                el.classList.remove('hidden');
              } else if (toggledSections.length == 0) {
                
                $sections.forEach(el => {
                  el.classList.remove('hidden');
                });


                document.querySelector('[data-js="document-filter-reset-btn"]').classList.add('active')
              }
            })
          });
        });

    }

    function handleResetFilter() {
      
      document.querySelector(`${sectionId} [data-js="document-filter-reset-btn"]`)
        .addEventListener('click', (e) => {
          e.target.classList.toggle('active');
          // reset pagination
          LoadMore().reset();


          // show all sections
          toggledSections = [];
          const $sections = document.querySelectorAll(`${sectionId} [data-js-section-topic-id]`);
          $sections.forEach(el => {
            el.classList.remove('hidden');
          });

          // clear buttons bg
          document.querySelectorAll(`${sectionId} [data-js-document-list-filter-btns]`)
            .forEach(filterButton => {
              filterButton.classList.remove('active')
            });
        });
    }
    return {
      init
    }
  }


  return {
    LoadMore,
    DocumentHeaderFilter
  }
}



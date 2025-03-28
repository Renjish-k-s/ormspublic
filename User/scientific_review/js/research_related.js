document.addEventListener("DOMContentLoaded", function () {
    // Word Count Restriction
    const textarea = document.getElementById("summary");
    const wordCountDisplay = document.getElementById("wordCount");

    textarea.addEventListener("input", function () {
        let words = this.value.match(/\b\w+\b/g) || []; // Match words
        let wordCount = words.length;

        if (wordCount > 300) {
            this.value = words.slice(0, 300).join(" "); // Trim extra words
            wordCount = 300;
        }

        wordCountDisplay.textContent = `${wordCount} / 300 words`;
    });

    // Get the checkbox and the container for the dropdown
    const academicResearchCheckbox = document.getElementById('academicResearchCheckbox');
    const academicResearchTypeContainer = document.getElementById('academicResearchTypeContainer');

    // Check if elements exist before adding an event listener
    if (academicResearchCheckbox && academicResearchTypeContainer) {
        academicResearchCheckbox.addEventListener('change', function () {
            academicResearchTypeContainer.style.display = this.checked ? 'block' : 'none';
        });
    }




    const i_c_research = document.getElementById('i_c_research');
    const industry_commercial_TypeContainer = document.getElementById('industry_commercial_TypeContainer');

    // Check if elements exist before adding an event listener
    if (i_c_research && industry_commercial_TypeContainer) {
        i_c_research.addEventListener('change', function () {
            industry_commercial_TypeContainer.style.display = this.checked ? 'block' : 'none';
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Word Count Restriction
       
    
        // Get the checkbox and the container for the dropdown
        const academicResearchCheckbox = document.getElementById('academicResearchCheckbox');
        const academicResearchTypeContainer = document.getElementById('academicResearchTypeContainer');
    
        // Check if elements exist before adding an event listener
        if (academicResearchCheckbox && academicResearchTypeContainer) {
            academicResearchCheckbox.addEventListener('change', function () {
                academicResearchTypeContainer.style.display = this.checked ? 'block' : 'none';
            });
        }
    
    
    
    
        const i_c_research = document.getElementById('i_c_research');
        const industry_commercial_TypeContainer = document.getElementById('industry_commercial_TypeContainer');
    
        // Check if elements exist before adding an event listener
        if (i_c_research && industry_commercial_TypeContainer) {
            i_c_research.addEventListener('change', function () {
                industry_commercial_TypeContainer.style.display = this.checked ? 'block' : 'none';
            });
        }




   
    
    
    });
    


    const fundingSelect = document.getElementById("s_fund_id");
    const externalAgencyContainer = document.getElementById("externalAgencyContainer");

    fundingSelect.addEventListener("change", function () {
        if (this.value === "c") {
            externalAgencyContainer.style.display = "block"; // Show input field
        } else {
            externalAgencyContainer.style.display = "none"; // Hide input field
        }
    });


   


    
});



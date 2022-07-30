    
    document.getElementById('filter_company_id')
    .addEventListener('change', (ev)=>{
        let companyId = (ev.target.value) || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId;
    });

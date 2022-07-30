    
    document.getElementById('filter_company_id')
    .addEventListener('change', (ev)=>{
        let companyId = (ev.target.value) || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId;
    });



    document.querySelectorAll('.btn-delete').forEach((button) => {
        button.addEventListener('click',(ev)=>{
            ev.preventDefault();
            if(confirm('Are you sure?')){
                let action = ev.target.getAttribute('href');
                let form = document.getElementById('form-delete')
                form.setAttribute('action', action);
                form.submit();
            }
        });
    })
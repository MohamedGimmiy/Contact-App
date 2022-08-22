


        let filter = document.getElementById('filter_company_id')
        if(filter != null){
                filter.addEventListener('change', (ev)=>{
            let companyId = (ev.target.value) || this.options[this.selectedIndex].value;
            window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId;
        });
        }



        document.querySelectorAll('.btn-delete').forEach((button) => {
            console.log(button)
            button.addEventListener('click',(ev)=>{
                ev.preventDefault();
                if (ev.target.hasAttribute('href')){
                    ev.preventDefault();
                    if(confirm('Are you sure?')){
                        let action = ev.target.getAttribute('href');
                        let form = document.getElementById('form-delete')
                        form.setAttribute('action', action);
                        console.log(action)
                        console.log(form)

                        form.submit();
                    }
                }
                // else do nothing
            });
        });

        let btn_clear = document.getElementById('search-clear');
        if(btn_clear){
            btn_clear.addEventListener('click', (ev)=> {
                let input = document.getElementById('search'),
                 select = document.getElementById('filter_company_id');


                if(input) input.value = "";
                if(select) select.selectedIndex = 0;
                //window.location.href = window.location.href.split('search')[0].replace('&',"")
                window.location.href = window.location.href.split('?')[0];
            });
        }

        const toggleClearButton = () => {
            let query = location.search,
            pattern = /[?&]search=/,
            button = document.getElementById('search-clear');

            if(button == undefined)return;
                if(pattern.test(query)){
                    button.style.display = "block"
                }
                else {
                    button.style.display = "none";
                }
        }
        toggleClearButton();



import Button from "@/components-dinamics/Button/Button";
import Input from "@/components-dinamics/Input/Input";
import Style  from '@/components/Cadastro/cadastro.module.css'
import axios from "axios";
import { useState } from "react";


export default function Register (){


    const [dadosForm, setDadosForm] = useState ({
        name: '',
        email: '',
        cpf: ''
    })

    const handleChange = (event) => {
        const{name, value} = event.target;
        setDadosForm({...dadosForm, [name]: value})
    }
    const handleSubmit = (event: any) => {
        event.preventDefault();
        
        axios.post('/cadastro', dadosForm)
            .then(response => {
                console.log(response.data)
            })
            .catch(error => {
                console.log(error)
            })
        
        console.log(dadosForm);
    }



    


    return(
        <div className={Style.container}>
            <div className={Style.container_form}>
                <header className={Style.header}>
                <img src="#" alt="#"/>
                <span className={Style.subtitle}>Crie Sua Conta</span>
                </header>
                <form onSubmit={handleSubmit} className="form">
                    <div className={Style.input}>
                    <Input
                        label="Nome:"
                        type="text"
                        value={dadosForm.name}
                        onChange={handleChange}
                    />
                    </div>
                    <div className={Style.input}>
                    <Input
                        label="Gmail:"
                        type="Email"
                        value={dadosForm.email}
                        onChange={handleChange}
                    />
                    </div>
                    <div className={Style.input}>
                    <Input
                        label="CPF:"
                        type="number"
                        value={dadosForm.cpf}
                        onChange={handleChange}
                    />
                    </div>
                    <Button 
                        type="submit"
                        text="Criar conta"
                        onClick={handleSubmit}
                    />
                    <div className={Style.footer}>
                        <p>Possui conta?</p>
                        <a href="/">Logar</a>
                    </div>
                </form>
            </div>
        </div>
    )
}
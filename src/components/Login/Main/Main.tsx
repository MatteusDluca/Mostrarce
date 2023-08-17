import Button from "@/components-dinamics/Button/Button";
import Input from "@/components-dinamics/Input/Input";
import Style  from '@/components/Login/Main/main.module.css'




export default function Main (){
    return(
        <div className={Style.container}>
            <div className={Style.container_form}>
                <header className={Style.header}>
                <img src="#" alt="#"/>
                <span className={Style.subtitle}>Seja Bem Vindo</span>
                </header>
                <form action="" className="form">
                    <div className={Style.input}>
                    <Input
                        label="Gmail:"
                        type="text"
                    />
                    </div>
                    <div className={Style.input}>
                    <Input
                        label="CPF:"
                        type="password"
                    />
                    </div>
                    <Button 
                        onClick={() => alert('Entrou')}
                        type="submit"
                        text="Entrar"
                    />
                    <div className={Style.footer}>
                        <p>Não possui conta ?</p>
                        <a href="/cadastro">Criar conta</a>
                    </div>
                </form>
            </div>
        </div>
    )
}
import Style from './button.module.css';



export default function Button(props: customButton){
    const { type,text, onClick} = props;
    return (
        <div className={Style.container}>
            <button type={type} onClick={onClick} className={Style.but}>{text}</button>
        </div>
    )
}
import Style from './input.module.css'

export default function Input (props: customInput){
    const { label, type, value, onChange } = props
    return(
        <div>
            <label className={Style.label}>{label}</label>
            <input type={type} value={value} onChange={onChange} className={Style.input} />
        </div>
    )
}
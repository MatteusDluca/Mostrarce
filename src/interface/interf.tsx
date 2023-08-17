interface customTex{
    text: string
}


interface customButton{
    text: string
    onClick: (e: any) => void
    type: any
}


interface customInput{
    label: string
    type: string
    value: string
    onChange: (e: any) => void
}
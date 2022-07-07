import { ChangeEvent, ChangeEventHandler } from "react";
import { useAppDispatch } from "../redux/Hooks/Hooks"
import { selectItems, unselectItems } from "../redux/ProductManger/ProductManager";



type CardProps = {
  sku:string,
  name:string,
  price:number,
  property:string
}


const Card = ({sku,name,price,property}:CardProps) => {
  const dispatch = useAppDispatch();


  function selectLogic(e:ChangeEvent<HTMLInputElement>) {
    if(e.target.checked){
      dispatch(selectItems({id:sku}))
    } else {
      dispatch(unselectItems({id:sku}))
    }
  }

  return (
    <article className="card link-reg">
      <input className=" card__input delete-checkbox" type="checkbox" onChange={selectLogic}/>
      <div className="card__info">
        <div className="card__info__sku">{sku}</div>
        <div className="card__info__name">{name}</div>
        <div className="card__info__price">{price}$</div>
        <div className="card__info__property">{property}</div>
      </div>
    </article>
  )
}

export default Card
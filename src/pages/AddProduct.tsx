import ProductAddNavbar from "../components/ProductAddNavbar"
import { useFormik } from "formik";
import * as Yup from 'yup';
import axios from "axios";


const AddProduct = () => {
  const formik = useFormik({
    initialValues:{
      sku:"",
      name:"",
      price:"",
      typeSwitcher:"dvd",
      size:"",
      height:"",
      width:"",
      length:"",
      weight:"",
    },
    validationSchema: Yup.object({
      sku: Yup.string().max(25,"Max length is 25").required(),
      name: Yup.string().max(25,"Max length is 25").required(),
      price: Yup.number().required(),
      size: Yup.number().when('typeSwitcher',{
        is: (val:string) => val === "dvd",
        then: Yup.number().required(),
        otherwise: Yup.number().notRequired(),
      }),
      height: Yup.number().when('typeSwitcher',{
        is: (val:string) => val === "furniture",
        then: Yup.number().required(),
        otherwise: Yup.number().notRequired(),
      }),
      width: Yup.number().when('typeSwitcher',{
        is: (val:string) => val === "furniture",
        then: Yup.number().required(),
        otherwise: Yup.number().notRequired(),
      }),
      length: Yup.number().when('typeSwitcher',{
        is: (val:string) => val === "furniture",
        then: Yup.number().required(),
        otherwise: Yup.number().notRequired(),
      }),
      weight: Yup.number().when('typeSwitcher',{
        is: (val:string) => val === "book",
        then: Yup.number().required(),
        otherwise: Yup.number().notRequired(),
      }),
    }),
    onSubmit: async () => {
      const sendData = await axios.post("/server/src/Controllers/ProductAdd.php",JSON.stringify({
        sku:formik.values.sku,
        name:formik.values.name,
        price:formik.values.price,
        type:formik.values.typeSwitcher,
        size:formik.values.size,
        height:formik.values.height,
        length:formik.values.length,
        width:formik.values.width,
        weight:formik.values.weight,
      }))
      const income = await sendData.data;
      if(income.status === 400){
        formik.setErrors({...income})
      } else {
        window.location.href = '/';
      }
    }
  });

  
  return (
    <main>
      <ProductAddNavbar />
      <div className="container">
        <form id="product_form" className='link-reg product' onSubmit={formik.handleSubmit}>
          <div className="product__input">
            <div className="product__input__sku">
              <div className="value">
                <label>SKU</label>
                <input type="text" name="sku" id="sku" value={formik.values.sku} onChange={formik.handleChange} onBlur={formik.handleBlur} />
              </div>
              <div className="errors link-sm">{formik.touched.sku && formik.errors.sku}</div>
            </div>
            <div className="product__input__name">
              <div className="value">
                <label>Name</label>
                <input type="text" name="name" id="name" value={formik.values.name} onChange={formik.handleChange} onBlur={formik.handleBlur} />
              </div>
              <div className="errors link-sm">{formik.touched.name && formik.errors.name}</div>
            </div>
            <div className="product__input__price">
              <div className="value">
                <label>Price($)</label>
                <input type="number" name="price" id="price" value={formik.values.price} onChange={formik.handleChange} onBlur={formik.handleBlur} />
              </div>
              <div className="errors link-sm">{formik.touched.price && formik.errors.price}</div>
            </div>
          </div>
          <div className="product__typeswitcher">
            <label>Type Switcher</label>
            <select name="typeSwitcher" id="productType" value={formik.values.typeSwitcher} onChange={formik.handleChange}  >
              <option value="dvd">DVD</option>
              <option value="book">Book</option>
              <option value="furniture">Furniture</option>
            </select>
          </div>
          <div className="product__attribute-holder">
            <div className={`dvd ${formik.values.typeSwitcher === 'dvd' ? 'dvd--active':''} `}>
              <div className="dvd__input">
                <div className="dvd__input__size">
                  <div className="value">
                    <label>Size(MB)</label>
                    <input type="number" name="size" id="size" value={formik.values.size} onChange={formik.handleChange} onBlur={formik.handleBlur}  />
                  </div>
                  <div className="errors link-sm">{formik.touched.size && formik.errors.size}</div>
                </div>
              </div>
              <p>Please provide size in mega bits</p>
            </div>
            <div className={`furniture ${formik.values.typeSwitcher === 'furniture' ? 'furniture--active':''}`}>
              <div className="furniture__input">
                <div className="furniture__input__height">
                  <div className="value">
                    <label>Height(CM)</label>
                    <input type="number" name="height" id="height" value={formik.values.height} onChange={formik.handleChange} onBlur={formik.handleBlur} />
                  </div>
                  <div className="errors link-sm">{formik.touched.height && formik.errors.height}</div>
                </div>
                <div className="furniture__input__width">
                  <div className="value">
                    <label>Width(CM)</label>
                    <input type="number" name="width" id="width" value={formik.values.width} onChange={formik.handleChange} onBlur={formik.handleBlur} />
                  </div>
                  <div className="errors link-sm">{formik.touched.width && formik.errors.width}</div>
                </div>
                <div className="furniture__input__length">
                  <div className="value">
                    <label>Length(CM)</label>
                    <input type="number" name="length" id="length" value={formik.values.length} onChange={formik.handleChange} onBlur={formik.handleBlur} />
                  </div>
                  <div className="errors link-sm">{formik.touched.length && formik.errors.length}</div>
                </div>
              </div>
              <p>Please provide dimensions in HxWxL format</p>
            </div>
            <div className={`book ${formik.values.typeSwitcher === 'book' ? 'book--active':''}`}>
              <div className="book__input">
                <div className="book__input__weight">
                  <div className="value">
                    <label>Weight(KG)</label>
                    <input type="number" name="weight" id="weight" value={formik.values.weight} onChange={formik.handleChange} onBlur={formik.handleBlur} />
                  </div>
                  <div className="errors link-sm">{formik.touched.weight && formik.errors.weight}</div>
                </div>
              </div>
              <p>Please provide book size in kilograms</p>
            </div>
          </div>
        </form>
      </div>
    </main>
  )
}

export default AddProduct
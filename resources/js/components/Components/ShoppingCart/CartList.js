import React from 'react'
import '../../assets/css/CartList.css'
import { Table, InputNumber, Button } from 'antd';
import { DeleteOutlined } from '@ant-design/icons';
import swal from 'sweetalert';

function CartList({productList, handleProductWasClicked, handleSetQuantity, formatCash, handleDeleteProduct}) {
    const [ checkStrictly ] = React.useState(false);
    const columns = [
      {
        title: 'Product name',
        dataIndex: 'name',
        key: 'name',
        width: '25%',
      },
      {
        title: 'price',
        dataIndex: 'priceDisplay',
        key: 'priceDisplay',
        width: '25%',
      },
      {
        title: 'quantity',
        dataIndex: 'quantity',
        key: 'quantity',
        render: (quantity, record) => <InputNumber 
                                          className="cart-list-quantity"
                                          defaultValue={quantity}
                                          min={1} max={10000}
                                          onChange={(event)=>handleSetQuantity(event, record)}
                                           />,
      },
      {
        title: 'Total',
        dataIndex: 'total',
        width: '25%',
        key: 'total',
      },
      {
        key: 'id_product',
      },
      {
        key: 'delete',
        render: (e, record) => <Button 
                                    type="primary" 
                                    onClick={() => DeleteProduct(record)} 
                                    icon={<DeleteOutlined />} danger />
      },
    ];

    const DeleteProduct = (record) => {

      swal({
        title: "Xóa sản phẩm",
        text: `Bạn có thực sự muốn xóa "${record.name}" không ?`,
        icon: "warning",
        buttons: ['Loại bỏ', 'Xác nhận'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          handleDeleteProduct(record)
          swal(`Bạn đã xóa "${record.name}" thành công !!`, {
            icon: "success",
          });
        }
      });
    }
    
    const datas = [];
    productList.map(product => {
      datas.push({
        key: product.id,
        id_product: product.id_product,
        name: product.name,
        price: product.price,
        priceDisplay: `${formatCash(product.price.toString())}₫`,
        quantity: product.quantity,
        total: `${formatCash((product.price * product.quantity).toString())}₫`,
        responsive: ['md'],
      })
    });
    
    
    // rowSelection objects indicates the need for row selection
    const rowSelection = {
      onChange: (selectedRowKeys, selectedRows) => {
        handleProductWasClicked(selectedRows);
      },
      onSelect: (record, selected, selectedRows) => {
        handleProductWasClicked(selectedRows);
      },
      onSelectAll: (selected, selectedRows, changeRows) => {
        handleProductWasClicked(selectedRows);
      },
    };

    return (
       <div className="cart-list">
            <Table
              className="cart-list-table"
              columns={columns}
              rowSelection={{ ...rowSelection, checkStrictly }}
              dataSource={datas}
            />
       </div>
    )
}

export default CartList

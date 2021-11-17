import React, { useState } from 'react';
import '../assets/css/ProductComment.css';
import { Comment, Avatar, Form, Button, List, Input } from 'antd';
import moment from 'moment';
const { TextArea } = Input;

const CommentList = ({ comments }) => (
    <List
      dataSource={comments}
      itemLayout="horizontal"
      renderItem={props => <Comment {...props} />}
    />
  );
  
  const Editor = ({ onChange, onSubmit, submitting, value }) => (
    <>
      <Form.Item>
        <TextArea rows={4} onChange={onChange} value={value} placeholder="Đánh giá sản phẩm tại đây ..." />
      </Form.Item>
      <Form.Item>
        <Button htmlType="submit" loading={submitting} onClick={onSubmit} type="primary">
          Đánh giá
        </Button>
      </Form.Item>
    </>
  );

const ProductComment = ({product}) => {
    
    const [comments, setComments] = useState([]);
    const [submitting, setSubmitting] = useState(false);
    const [value, setValue] = useState('');
    const handleSubmit = () => {
        if (!value) {
          return;
        }
        setSubmitting(true);
    
        setTimeout(() => {
            setSubmitting(false);
            setValue('');
            setComments([
                ...comments,
                {
                  author: 'Han Solo',
                  avatar: 'https://joeschmoe.io/api/v1/random',
                  content: <p>{value}</p>,
                  datetime: moment().fromNow(),
                },
              ]);
        }, 1000);
      };
    
    const handleChange = e => {
        setValue(e.target.value);
    };
    return (
        <React.Fragment>
           <div className="product-comment">
                <h1 className="title">
                        Đánh giá sản phẩm
                    </h1>
                    {comments.length > 0 && <CommentList comments={comments} />}
                    <Comment
                        avatar={<Avatar src="https://joeschmoe.io/api/v1/random" alt="Han Solo" />}
                        content={
                        <Editor
                            onChange={handleChange}
                            onSubmit={handleSubmit}
                            submitting={submitting}
                            value={value}
                        />
                        }
                    />
           </div>
        </React.Fragment>
    );
}

export default ProductComment;

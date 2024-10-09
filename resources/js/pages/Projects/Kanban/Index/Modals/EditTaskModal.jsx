import useTaskDrawerStore from '@/hooks/store/useTaskDrawerStore';
import RichTextEditor from '@/components/RichTextEditor';
import useTasksStore from '@/hooks/store/useTasksStore';
import { Button, Flex, Text, TextInput } from '@mantine/core';
import { modals } from '@mantine/modals';
import { useEffect, useRef, useState } from 'react';
import Dropzone from '@/components/Dropzone';
import Comments from '../../../Tasks/Drawers/Comments';

function ModalForm(task) {

  const { findTask, updateTaskProperty, deleteAttachment, uploadAttachments } = useTasksStore();
  const editorRef = useRef(null);
  const newTask = findTask(task.id)

  const [data, setData] = useState({
    group_id: '',
    assigned_to_user_id: '',
    name: '',
    check: '',
    description: '',
    estimation: 0,
    due_on: '',
  });

  useEffect(() => {
    setData({
      group_id: newTask?.group_id || '',
      assigned_to_user_id: newTask?.assigned_to_user_id || '',
      name: newTask?.name || '',
      check: newTask?.check || '',
      description: newTask?.description || '',
      estimation: newTask?.estimation || 0,
    });
    editorRef.current?.setContent(newTask?.description || '');
  }, [newTask]);

  const updateValue = (field, value) => {
    setData({ ...data, [field]: value });
    const onBlurInputs = ["name", "description"];
    if (!onBlurInputs.includes(field)) {
      updateTaskProperty(newTask, field, value);
    }
  };

  const onBlurUpdate = (property) => {
    if (data.name.length > 0) {
      updateTaskProperty(newTask, property, data[property]);
    }
  };

  return (
    <form>
      <TextInput
        label='Nombre'
        placeholder='Nombre de la tarea'
        value={data.name}
        onChange={e => updateValue('name', e.target.value)}
        onBlur={() => onBlurUpdate('name')}
        error={data.name.length == 0}
        readOnly={!can('ediar tarea')}
      />

      <RichTextEditor
        ref={editorRef}
        mt='xl'
        placeholder='Descripción de la tarea'
        content={data.description}
        height={260}
        onChange={content => updateValue('description', content)}
        onBlur={() => onBlurUpdate('description')}
        readOnly={!can('ediar tarea')}
      />

      {can('completar tarea') && (
        <Dropzone
          mt='xl'
          selected={newTask.attachments}
          onChange={files => uploadAttachments(newTask, files)}
          remove={index => deleteAttachment(newTask, index)}
        />
      )}

      {can('ver comentarios') && <Comments task={newTask} />}
    </form>
  );
}

const EditTaskModal = (task) => {
  modals.open({
    title: (
      <Text
        size='xl'
        fw={700}
        mb={-10}
      >
        Editar tarea
      </Text>
    ),
    centered: true,
    size: '70%',
    padding: 'xl',
    overlayProps: { backgroundOpacity: 0.55, blur: 3 },
    children: <ModalForm {...task} />,
  });
};

export default EditTaskModal;

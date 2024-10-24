import useTaskDrawerStore from '@/hooks/store/useTaskDrawerStore';
import RichTextEditor from '@/components/RichTextEditor';
import useTasksStore from '@/hooks/store/useTasksStore';
import { Box, Button, Flex, Loader, LoadingOverlay, Text, TextInput } from '@mantine/core';
import { modals } from '@mantine/modals';
import { useEffect, useRef, useState } from 'react';
import Dropzone from '@/components/Dropzone';
import Comments from '../../../Tasks/Drawers/Comments';
import useProjectsStore from '@/hooks/store/useProjectsStore';

function ModalForm({task}) {

  const { findTask, updateTaskProperty, deleteAttachment, uploadAttachments,
    convertBase64ToFile, viewAttachments } = useTasksStore();
  const { findProject, updateProjectProperty } = useProjectsStore();
  const editorRef = useRef(null);
  const newTask = findTask(task.id);
  const [loading, setLoading] = useState(false);
  const tasksLocal = localStorage.getItem('tasks') || false;

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
      name: newTask?.name || '',
    });
    editorRef.current?.setContent(newTask?.description || '');
  }, [newTask]);

  useEffect(() => {
    if(tasksLocal){

      const project = findProject(newTask.project_id);
      const updatedTasks = JSON.parse(tasksLocal).map(taskLocal => {
        if(taskLocal.id == newTask.id){
          // Convertir de base64 a tipo File
            const attachments = taskLocal.attachments || []; // Asegúrate de que existen
            attachments.forEach(attachment => {
              if(newTask.attachments.length == 0){
                viewAttachments(newTask, [attachment])
              }
            });
            updateTaskProperty(taskLocal, 'check', taskLocal.check);
        }
        return taskLocal;
      });

      updateProjectProperty(project, 'tasks', updatedTasks)
    }
  }, [localStorage.getItem('tasks')]);


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

      <LoadingOverlay visible={loading} loaderProps={{ children: <Loader size={40} /> }} />

      <TextInput
        label='Nombre'
        placeholder='Nombre de la tarea'
        value={data.name}
        onChange={e => updateValue('name', e.target.value)}
        onBlur={() => onBlurUpdate('name')}
        error={data.name.length == 0}
        readOnly={!can('editar tarea')}
      />

      <RichTextEditor
        ref={editorRef}
        mt='xl'
        placeholder='Descripción de la tarea'
        content={data.description}
        height={260}
        onChange={content => updateValue('description', content)}
        onBlur={() => onBlurUpdate('description')}
        readOnly={!can('editar tarea')}
      />

      {can('completar tarea') && (
        <Dropzone
          mt='xl'
          selected={newTask.attachments}
          onChange={files => uploadAttachments(newTask, files, setLoading) }
          remove={index => deleteAttachment(newTask, index, setLoading)}
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
    overlayProps: {
      backgroundOpacity: 0.55,
      blur: 3,
    },
    children: <ModalForm task={task} />,
  });
};

export default EditTaskModal;

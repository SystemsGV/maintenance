import { onUploadProgress } from '@/utils/axios';
import axios from 'axios';
import { produce } from "immer";

const createTaskAttachmentsSlice = (set, get) => ({
  uploadAttachments: async (task, files, setLoading) => {
    setLoading(true);
    try {
      const index = get().tasks[task.group_id].findIndex((i) => i.id == task.id);
      const tasksLocal =localStorage.getItem('tasks') || false;

      if(tasksLocal){
        get().convertFileToBase64(task, files);
        return set(produce(state => {
          state.tasks[task.group_id][index].attachments = [
            ...files // Mapea los archivos para cambiar sus nombres
          ];
          setLoading(false);
        }));
      }

      const areAttachmentsFiles = files.every(attachment => attachment instanceof File);
      // Prepara los archivos para enviar
      const attachmentsToSend = areAttachmentsFiles
        ? files.filter(file => file.id == undefined) // Filtra los archivos que no tienen un ID
        : files.map(file => get().convertBase64ToFile(file)); // Convierte los archivos base64 a File

        const { data } = await axios.postForm(
        route("projects.tasks.attachments.upload", [task.project_id, task.id]),
        { attachments: attachmentsToSend },
        { onUploadProgress }
      );

      return set(produce(state => {
        state.tasks[task.group_id][index].attachments = [
          ...state.tasks[task.group_id][index].attachments,
          ...data.files,
        ];
      setLoading(false);
      }));

    } catch (e) {
      console.error(e);
      setLoading(false);
      alert("Failed to upload attachments");
    }
  },

  deleteAttachment: async (task, index, setLoading) => {
    setLoading(true);

    try {
      const taskIndex = get().tasks[task.group_id].findIndex((i) => i.id == task.id);
      const tasksLocal =localStorage.getItem('tasks') || false;
      const deleteId = get().tasks[task.group_id][taskIndex].attachments[index].id;

      if(tasksLocal){

        const updateTasksLocal =  JSON.parse(tasksLocal).map((taskLocal) => {
          if(taskLocal.id == task.id){
            const updatedAttachments = taskLocal.attachments.filter((_, idx) => idx != index);
            return { ...taskLocal, attachments: updatedAttachments };
          }
          return taskLocal;
        });

        localStorage.setItem('tasks', JSON.stringify(updateTasksLocal));

        return set(produce(state => {
          state.tasks[task.group_id][taskIndex].attachments = [
            ...state.tasks[task.group_id][taskIndex].attachments.filter(i => i.id != deleteId)
          ];
          setLoading(false);
        }));

      }

      await axios.delete(route("projects.tasks.attachments.destroy", [task.project_id, task.id, deleteId]), { progress: true });
      return set(produce(state => {
        state.tasks[task.group_id][taskIndex].attachments = [
          ...state.tasks[task.group_id][taskIndex].attachments.filter(i => i.id != deleteId)
        ];
        setLoading(false);
      }));

    } catch (e) {
      setLoading(false);
      console.error(e);
      alert("Failed to delete attachment");
    }
  },

  convertFileToBase64: async (task, files) => {
    try {
      const index = get().tasks[task.group_id].findIndex((i) => i.id == task.id);
      const tasksLocal = JSON.parse(localStorage.getItem('tasks'));

      const base64Files = await Promise.all(files.map(file => {
        return new Promise((resolve, reject) => {
          const reader = new FileReader();
          reader.onload = () => resolve(reader.result); // Devuelve el resultado en Base64
          reader.onerror = (error) => reject(error); // Maneja errores
          reader.readAsDataURL(file); // Lee el archivo como Data URL
        });
      }));

      // Actualiza las tareas locales con los archivos en base64
      const updateTasksLocal = tasksLocal.map((taskLocal) => {
        if (taskLocal.id == task.id) {
          const updatedAttachments = [...base64Files];
          return { ...taskLocal, attachments: updatedAttachments };
        }
        return taskLocal;
      });
      localStorage.setItem('tasks', JSON.stringify(updateTasksLocal));

      return set(produce(state => {
        state.tasks[task.group_id][index].attachments = [
          // ...state.tasks[task.group_id][index].attachments,
          ...files.filter(i => i.id == undefined),
        ];
      }));

    } catch (error) {
      console.error(error);
      alert("Failed to upload attachments");
    }
  },

  convertBase64ToFile: (base64) => {
    try {

      // Divide la cadena Base64 en sus partes
      const arr = base64.split(',');
      const mime = arr[0].match(/:(.*?);/)[1]; // Extrae el tipo MIME
      const bstr = atob(arr[1]); // Decodifica la parte Base64
      let n = bstr.length;
      const u8arr = new Uint8Array(n);

      // Llena el arreglo Uint8Array con los bytes del archivo
      while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
      }

      return new File([u8arr], `${Date.now()}.${mime.split('/')[1]}`, { type: mime });

    } catch (error) {
      console.error(error);
      alert("Failed to upload attachments");
    }

  },

  viewAttachments: async (task, files) => {
    try {

      const areAttachmentsFiles = files.every(attachment => attachment instanceof File);
      const index = get().tasks[task.group_id].findIndex((i) => i.id == task.id);

      let file = [];
      if(!areAttachmentsFiles){
        file = files.map(file => {
          return get().convertBase64ToFile(file);
        })
      }

      return set(produce(state => {
        state.tasks[task.group_id][index].attachments = [
          ...state.tasks[task.group_id][index].attachments,
          ...file // Agrega el nuevo archivo
        ];
      }));
    } catch (error) {
      console.error(error);
      alert("No se lograron cargar las imagenes");
    }
  },
});

export default createTaskAttachmentsSlice;

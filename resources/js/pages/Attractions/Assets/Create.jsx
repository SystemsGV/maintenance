import ActionButton from '@/components/ActionButton';
import BackButton from '@/components/BackButton';
import useForm from '@/hooks/useForm';
import ContainerBox from '@/layouts/ContainerBox';
import Layout from '@/layouts/MainLayout';
import { redirectTo } from '@/utils/route';
import {
  Anchor,
  Breadcrumbs,
  Fieldset,
  Grid,
  Group,
  Select,
  TextInput,
  Title,
} from '@mantine/core';

const AssetsCreate = () => {
  const [form, submit, updateValue] = useForm('post', route('attractions.assets.store'), {
    name: '',
    code: '',
    address: '',
    city: '',
    departament: '',
    country: '',
    area_code: '',
    priority: '',
    latitude: '',
    longitude: '',
    type: '',
    cost: '',
  });

  return (
    <>
      <Breadcrumbs
        fz={14}
        mb={30}
      >
        <Anchor
          href='#'
          onClick={() => redirectTo('attractions.assets.index')}
          fz={14}
        >
          Ubicaciones
        </Anchor>
        <div>Crear</div>
      </Breadcrumbs>

      <Grid
        justify='space-between'
        align='flex-end'
        gutter='xl'
        mb='lg'
      >
        <Grid.Col span='auto'>
          <Title order={1}>Crear ubicación</Title>
        </Grid.Col>
        <Grid.Col span='content'></Grid.Col>
      </Grid>

      <ContainerBox maw={600}>
        <form onSubmit={submit}>
          <TextInput
            label='Nombre'
            placeholder='Nombre de la ubicación'
            required
            value={form.data.name}
            onChange={e => updateValue('name', e.target.value)}
            error={form.errors.name}
          />

          <TextInput
            label='Código'
            placeholder='Código de la ubicación'
            required
            mt='md'
            value={form.data.code}
            onChange={e => updateValue('code', e.target.value)}
            error={form.errors.code}
          />

          <TextInput
            label='Dirección'
            placeholder='Dirección de la ubicación'
            required
            mt='md'
            value={form.data.address}
            onChange={e => updateValue('address', e.target.value)}
            error={form.errors.address}
          />

          <TextInput
            label='Ciudad'
            placeholder='Ciudad de la ubicación'
            required
            mt='md'
            value={form.data.city}
            onChange={e => updateValue('city', e.target.value)}
            error={form.errors.city}
          />

          <TextInput
            label='Departamento'
            placeholder='Departamento de la ubicación'
            required
            mt='md'
            value={form.data.departament}
            onChange={e => updateValue('departament', e.target.value)}
            error={form.errors.departament}
          />

          <TextInput
            label='País'
            placeholder='País de la ubicación'
            required
            mt='md'
            value={form.data.country}
            onChange={e => updateValue('country', e.target.value)}
            error={form.errors.country}
          />

          <TextInput
            label='Código de area'
            placeholder='Código de area de la ubicación'
            mt='md'
            value={form.data.area_code}
            onChange={e => updateValue('area_code', e.target.value)}
            error={form.errors.area_code}
          />

          <Select
            label='Prioridad'
            placeholder='Prioridad de la ubicación'
            required
            mt='md'
            searchable={false}
            value={form.data.priority}
            onChange={value => updateValue('priority', value)}
            data={['Baja', 'Media', 'Alta']}
            error={form.errors.priority}
          />

          <TextInput
            label='Latitud'
            placeholder='Latitud de la ubicación'
            mt='md'
            value={form.data.latitude}
            onChange={e => updateValue('latitude', e.target.value)}
            error={form.errors.latitude}
          />

          <TextInput
            label='Longitud'
            placeholder='Longitud de la ubicación'
            mt='md'
            value={form.data.longitude}
            onChange={e => updateValue('longitude', e.target.value)}
            error={form.errors.longitude}
          />

          <Select
            label='Tipo'
            placeholder='Tipo de la ubicación'
            mt='md'
            searchable={false}
            value={form.data.type}
            onChange={value => updateValue('type', value)}
            data={['Espacio cerrado', 'Espacio abierto']}
            error={form.errors.type}
          />

          <Select
            label='Centro de costo'
            placeholder='Costo de la ubicación'
            mt='md'
            searchable={false}
            value={form.data.cost}
            onChange={value => updateValue('cost', value)}
            data={['Espacio cerrado', 'Espacio abierto']}
            error={form.errors.cost}
          />

          <Group
            justify='space-between'
            mt='xl'
          >
            <BackButton route='attractions.assets.index' />
            <ActionButton loading={form.processing}>Crear</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

AssetsCreate.layout = page => <Layout title='Crear ubicación'>{page}</Layout>;

export default AssetsCreate;

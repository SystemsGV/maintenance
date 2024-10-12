import ActionButton from '@/components/ActionButton';
import BackButton from '@/components/BackButton';
import useForm from '@/hooks/useForm';
import ContainerBox from '@/layouts/ContainerBox';
import Layout from '@/layouts/MainLayout';
import { redirectTo } from '@/utils/route';
import dayjs from "dayjs";
import {
  Anchor,
  Breadcrumbs,
  Checkbox,
  Grid,
  Group,
  MultiSelect,
  NumberInput,
  Select,
  TextInput,
  Textarea,
  Title,
} from '@mantine/core';
import { DateInput, DateTimePicker } from '@mantine/dates';
import { useEffect, useState } from 'react';

const ProjectCreate = ({ dropdowns: { companies, users, currencies, games, types } }) => {
  const [currencySymbol, setCurrencySymbol] = useState();
  const [isFaultSheet, setIsFaultSheet] = useState(false);

  const [form, submit, updateValue] = useForm('post', route('projects.store'), {
    name: '',
    description: '',
    rate: 0,
    client_company_id: '',
    game_id: '',
    due_on: '',
    start_date: '',
    fault_date: '',
    type_id: '',
    default: false,
    users: [],
  });

  useEffect(() => {
    let symbol = currencies.find(i =>
      i.client_companies.find(c => c.id.toString() === form.data.client_company_id)
    )?.symbol;

    if (symbol) {
      setCurrencySymbol(symbol);
    }
  }, [form.data.client_company_id]);

  const handleFaulSheetChange = (event) => {
    setIsFaultSheet(event.currentTarget.checked);
  };

  return (
    <>
      <Breadcrumbs
        fz={14}
        mb={30}
      >
        <Anchor
          href='#'
          onClick={() => redirectTo('projects.index')}
          fz={14}
        >
          Ordenes de trabajo
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
          <Title order={1}>Crear orden de trabajo</Title>
        </Grid.Col>
        <Grid.Col span='content'></Grid.Col>
      </Grid>

      <ContainerBox maw={500}>
        <form onSubmit={submit}>
          <TextInput
            label='Nombre'
            placeholder='Nombre de la orden de trabajo'
            required
            mt='md'
            value={form.data.name}
            onChange={e => updateValue('name', e.target.value)}
            error={form.errors.name}
          />

          <Textarea
            label='Descripción'
            placeholder='Descripción de la orden de trabajo'
            mt='md'
            autosize
            minRows={4}
            maxRows={8}
            value={form.data.description}
            onChange={e => updateValue('description', e.target.value)}
          />

          <Select
            label='Company requesting work'
            placeholder='Select company'
            required
            display="none"
            mt='md'
            value={form.data.client_company_id}
            onChange={value => updateValue('client_company_id', value)}
            data={companies}
            error={form.errors.client_company_id}
          />

          <Select
            label="Atracción que requiere mantenimiento"
            placeholder="Seleccionar atracción"
            searchable
            mt="md"
            value={form.data.game_id}
            onChange={(value) => updateValue("game_id", value)}
            data={games}
            error={form.errors.game_id}
          />

          <DateInput
            clearable
            valueFormat='DD MMM YYYY'
            minDate={new Date()}
            mt='md'
            label='Fecha de vencimiento'
            placeholder='Elija la fecha de vencimiento de la OT'
            value={form.data.due_on ? new Date(form.data.due_on) : null}
            onChange={value => {
              const formattedDate = value ? dayjs.tz(value, 'America/Lima').format() : null; // Formatear la fecha
              updateValue('due_on', formattedDate); // Actualizar el valor formateado
            }}
          />

          {isFaultSheet && (
            <>
              <DateTimePicker
                clearable
                valueFormat="DD MMM YYYY hh:mm A"
                label="Hora de falla"
                placeholder="Elija la fecha y hora de la falla"
                mt='md'
                value={form.data.fault_date ? new Date(form.data.fault_date) : null}
                onChange={value => {
                  const formattedDate = value ? dayjs.tz(value, 'America/Lima').format() : null;
                  updateValue('fault_date', formattedDate);
                }}
              />
              <DateTimePicker
                clearable
                valueFormat="DD MMM YYYY hh:mm A"
                label="Hora de inicio"
                placeholder="Elija la fecha y hora de inicio"
                mt='md'
                value={form.data.start_date ? new Date(form.data.start_date) : null}
                onChange={value => {
                  const formattedDate = value ? dayjs.tz(value, 'America/Lima').format() : null;
                  updateValue('start_date', formattedDate);
                }}
              />
            </>
          )}

          <Select
            label="Tipo de mantenimiento"
            placeholder="Seleccionar tipo de mantenimiento"
            searchable
            mt="md"
            value={form.data.type_id}
            onChange={(value) => updateValue("type_id", value)}
            data={types}
            error={form.errors.type_id}
          />

          <MultiSelect
            label="Conceder acceso a los usuarios"
            placeholder="Seleccionar usuarios"
            mt='md'
            searchable
            value={form.data.users}
            onChange={(values) => updateValue("users", values)}
            data={users}
            error={form.errors.users}
          />

          <NumberInput
            label='Tarifa por hora'
            mt='md'
            allowNegative={false}
            clampBehavior='strict'
            decimalScale={2}
            fixedDecimalScale={true}
            prefix={currencySymbol}
            value={form.data.rate}
            display="none"
            onChange={value => updateValue('rate', value)}
            error={form.errors.rate}
          />

          <Checkbox
            label="¿Es una hoja de falla?"
            description="Seleccione si desea agregar una hoja de falla"
            mt="xl"
            checked={isFaultSheet}
            onChange={handleFaulSheetChange}
          />

          <Group
            justify='space-between'
            mt='xl'
          >
            <BackButton route='projects.index' />
            <ActionButton loading={form.processing}>Crear</ActionButton>
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

ProjectCreate.layout = page => <Layout title='Crear orden de trabajo'>{page}</Layout>;

export default ProjectCreate;

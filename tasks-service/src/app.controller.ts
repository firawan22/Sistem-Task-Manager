import { Body, Controller, Delete, Get, Param, Post } from '@nestjs/common';
import { AppService } from './app.service';

@Controller('tasks')
export class AppController {
  constructor(private readonly appService: AppService) {}

  @Get()
  getAll() {
    return this.appService.getTasks();
  }

  @Post('create')
  create(@Body() body: any) {
    return this.appService.createTask(body);
  }

  @Delete(':id')
  delete(@Param('id') id: string) {
    return this.appService.deleteTask(Number(id));
  }
}
